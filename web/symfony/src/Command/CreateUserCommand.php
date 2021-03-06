<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create-user';
    protected static $defaultDescription = 'Add a short description for your command';
    private EntityManagerInterface $em;
    private UserRepository $userRepository;
    private UserPasswordEncoderInterface $userPasswordEncoder;

    public function __construct(
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $userPasswordEncoder,
        UserRepository $userRepository
    ) {
        $this->em = $em;
        $this->userRepository = $userRepository;
        $this->userPasswordEncoder = $userPasswordEncoder;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('email', InputArgument::REQUIRED, 'user\'s email')
            ->addArgument('password', InputArgument::REQUIRED, 'user\'s password')
            ->addArgument('role', InputArgument::REQUIRED, 'user\'s role')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = $input->getArgument('email');
        $plainPassword = $input->getArgument('password');
        $role = $input->getArgument('role');

        $user = $this->userRepository->findOneByEmail($email);

        if (false === empty($user)) {
            $output->writeln('<error>That user already exists</error>');
            return Command::FAILURE;
        }

        $user = new User();
        $user->setFirstName($email);
        $user->setLastName($email);
        $user->setEmail($email);
        $password = $this->userPasswordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($password);

        switch ($role) {
            case 'candidate':
                $user->setRoles(['ROLE_CANDIDATE']);
                break;
            case 'company':
                $user->setRoles(['ROLE_COMPANY']);
                break;
            default:
                $user->setRoles(['ROLE_ADMIN']);

        }

        $this->em->persist($user);
        $this->em->flush();

        $output->writeln('<info>User created!</info>');

        return Command::SUCCESS;
    }
}
