<?php

namespace App\Entity;

use App\Repository\AssessmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=AssessmentRepository::class)
 */
class Assessment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $rating;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $publicationDate;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default":false})
     */
    private $deleted = false;

    /**
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var Company|null $valuedCompany
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="valued_company_id", referencedColumnName="id", nullable=true)
     */
    private $valuedCompany;

    /**
     * @var User|null $valuedUser
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="valued_user_id", referencedColumnName="id", nullable=true)
     */
    private $valuedUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating): void
    {
        $this->rating = $rating;
    }

    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    public function setPublicationDate($publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getValuedCompany(): ?Company
    {
        return $this->valuedCompany;
    }

    public function setValuedCompany(?Company $valuedCompany): void
    {
        $this->valuedCompany = $valuedCompany;
    }

    public function getValuedUser(): ?User
    {
        return $this->valuedUser;
    }

    public function setValuedUser(?User $valuedUser): void
    {
        $this->valuedUser = $valuedUser;
    }
}
