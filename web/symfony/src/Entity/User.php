<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, nullable=false, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $lastName;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default":false})
     */
    private $deleted = false;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var Company|null $company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
     */
    private $company;

    /**
     * @ORM\ManyToMany(targetEntity="Crop")
     */
    private $crops;

    /**
     * @ORM\ManyToMany(targetEntity="Machinery")
     */
    private $machineries;

    /**
     * @ORM\ManyToMany(targetEntity="Gang")
     */
    private $gangs;

    public function __construct()
    {
        $this->crops = new ArrayCollection();
        $this->machineries = new ArrayCollection();
        $this->gangs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted($deleted): void
    {
        $this->deleted = $deleted;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): void
    {
        $this->company = $company;
    }

    public function addCrop(Crop $crop): self
    {
        $this->crops[] = $crop;

        return $this;
    }

    public function removeCrop(Crop $crop): bool
    {
        return $this->crops->removeElement($crop);
    }

    public function getCrops(): Collection
    {
        return $this->crops;
    }

    public function addMachinary(Machinery $machinery): self
    {
        $this->machineries[] = $machinery;

        return $this;
    }

    public function removeMachinary(Machinery $machinery): bool
    {
        return $this->machineries->removeElement($machinery);
    }

    public function getMachineries(): Collection
    {
        return $this->machineries;
    }

    public function addGang(Gang $gang): self
    {
        $this->gangs[] = $gang;

        return $this;
    }

    public function removeGang(Gang $gang): bool
    {
        return $this->gangs->removeElement($gang);
    }

    public function getGangs(): Collection
    {
        return $this->gangs;
    }

    public function isCandidate() {
        return in_array('ROLE_CANDIDATE', $this->getRoles());
    }

    public function isCompany() {
        return in_array('ROLE_COMPANY', $this->getRoles());
    }

    public function isAdmin() {
        return in_array('ROLE_ADMIN', $this->getRoles());
    }
}
