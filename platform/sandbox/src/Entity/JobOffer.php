<?php

namespace App\Entity;

use App\Repository\JobOfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=JobOfferRepository::class)
 * @UniqueEntity(fields={"code", "company_id"}, message="There is already a job offer with this code")
 */
class JobOffer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10, nullable=false)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $publicationDate;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $jobStartDate;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $jobEndDate;

    /**
     * @ORM\Column(type="integer", nullable=false, options={"default":0})
     */
    private $vacancies = 0;

    /**
     * @var Company $company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
     */
    private $company;

    /**
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="Crop")
     */
    private $crops;

    /**
     * @ORM\ManyToMany(targetEntity="Machinery")
     */
    private $machineries;

    public function __construct()
    {
        $this->crops = new ArrayCollection();
        $this->machineries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode($code): void
    {
        $this->code = $code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getPublicationDate(): ?\DateTimeImmutable
    {
        return $this->publicationDate;
    }

    public function setPublicationDate($publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }

    public function getJobStartDate(): ?\DateTimeImmutable
    {
        return $this->jobStartDate;
    }

    public function setJobStartDate($jobStartDate): void
    {
        $this->jobStartDate = $jobStartDate;
    }

    public function getJobEndDate(): ?\DateTimeImmutable
    {
        return $this->jobEndDate;
    }

    public function setJobEndDate($jobEndDate): void
    {
        $this->jobEndDate = $jobEndDate;
    }

    public function getVacancies(): int
    {
        return $this->vacancies;
    }

    public function setVacancies(int $vacancies): void
    {
        $this->vacancies = $vacancies;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
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
}
