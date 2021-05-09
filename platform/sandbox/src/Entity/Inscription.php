<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
 * @UniqueEntity(fields={"user_id", "offer_job_id"}, message="There is already an inscription with this user and this offer job")
 */
class Inscription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="integer", nullable=false, options={"default":0})
     */
    private $state = 0;

    /**
     * @var JobOffer $jobOffer
     *
     * @ORM\ManyToOne(targetEntity="JobOffer")
     * @ORM\JoinColumn(name="job_offer_id", referencedColumnName="id", nullable=true)
     */
    private $jobOffer;

    /**
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user;

    /**
     * @var Crop|null $crop
     *
     * @ORM\ManyToOne(targetEntity="Crop")
     * @ORM\JoinColumn(name="crop_id", referencedColumnName="id", nullable=true)
     */
    private $crop;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    public function getState(): int
    {
        return $this->state;
    }

    public function setState(int $state): void
    {
        $this->state = $state;
    }

    public function getJobOffer(): JobOffer
    {
        return $this->jobOffer;
    }

    public function setJobOffer(JobOffer $jobOffer): void
    {
        $this->jobOffer = $jobOffer;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getCrop(): ?Crop
    {
        return $this->crop;
    }

    public function setCrop(?Crop $crop): void
    {
        $this->crop = $crop;
    }
}
