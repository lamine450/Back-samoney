<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDepot;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateRetrait;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAnnulation;

    /**
     * @ORM\Column(type="integer")
     */
    private $ttc;

    /**
     * @ORM\Column(type="integer")
     */
    private $fraisEtat;

    /**
     * @ORM\Column(type="integer")
     */
    private $fraisSysteme;

    /**
     * @ORM\Column(type="integer")
     */
    private $fraisEnvoi;

    /**
     * @ORM\Column(type="integer")
     */
    private $fraisRetrait;

    /**
     * @ORM\Column(type="integer")
     */
    private $codeTransaction;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="transaction")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="transactions")
     */
    private $compte;

    /**
     * @ORM\OneToMany(targetEntity=TypeDeTransaction::class, mappedBy="transaction")
     */
    private $typeDeTransactions;

    /**
     * @ORM\OneToMany(targetEntity=TypeTransactionClient::class, mappedBy="transaction")
     */
    private $typeTransactionClients;

    public function __construct()
    {
        $this->typeDeTransactions = new ArrayCollection();
        $this->typeTransactionClients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->dateDepot;
    }

    public function setDateDepot(\DateTimeInterface $dateDepot): self
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->dateRetrait;
    }

    public function setDateRetrait(\DateTimeInterface $dateRetrait): self
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    public function getDateAnnulation(): ?\DateTimeInterface
    {
        return $this->dateAnnulation;
    }

    public function setDateAnnulation(\DateTimeInterface $dateAnnulation): self
    {
        $this->dateAnnulation = $dateAnnulation;

        return $this;
    }

    public function getTtc(): ?int
    {
        return $this->ttc;
    }

    public function setTtc(int $ttc): self
    {
        $this->ttc = $ttc;

        return $this;
    }

    public function getFraisEtat(): ?int
    {
        return $this->fraisEtat;
    }

    public function setFraisEtat(int $fraisEtat): self
    {
        $this->fraisEtat = $fraisEtat;

        return $this;
    }

    public function getFraisSysteme(): ?int
    {
        return $this->fraisSysteme;
    }

    public function setFraisSysteme(int $fraisSysteme): self
    {
        $this->fraisSysteme = $fraisSysteme;

        return $this;
    }

    public function getFraisEnvoi(): ?int
    {
        return $this->fraisEnvoi;
    }

    public function setFraisEnvoi(int $fraisEnvoi): self
    {
        $this->fraisEnvoi = $fraisEnvoi;

        return $this;
    }

    public function getFraisRetrait(): ?int
    {
        return $this->fraisRetrait;
    }

    public function setFraisRetrait(int $fraisRetrait): self
    {
        $this->fraisRetrait = $fraisRetrait;

        return $this;
    }

    public function getCodeTransaction(): ?int
    {
        return $this->codeTransaction;
    }

    public function setCodeTransaction(int $codeTransaction): self
    {
        $this->codeTransaction = $codeTransaction;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * @return Collection|TypeDeTransaction[]
     */
    public function getTypeDeTransactions(): Collection
    {
        return $this->typeDeTransactions;
    }

    public function addTypeDeTransaction(TypeDeTransaction $typeDeTransaction): self
    {
        if (!$this->typeDeTransactions->contains($typeDeTransaction)) {
            $this->typeDeTransactions[] = $typeDeTransaction;
            $typeDeTransaction->setTransaction($this);
        }

        return $this;
    }

    public function removeTypeDeTransaction(TypeDeTransaction $typeDeTransaction): self
    {
        if ($this->typeDeTransactions->removeElement($typeDeTransaction)) {
            // set the owning side to null (unless already changed)
            if ($typeDeTransaction->getTransaction() === $this) {
                $typeDeTransaction->setTransaction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TypeTransactionClient[]
     */
    public function getTypeTransactionClients(): Collection
    {
        return $this->typeTransactionClients;
    }

    public function addTypeTransactionClient(TypeTransactionClient $typeTransactionClient): self
    {
        if (!$this->typeTransactionClients->contains($typeTransactionClient)) {
            $this->typeTransactionClients[] = $typeTransactionClient;
            $typeTransactionClient->setTransaction($this);
        }

        return $this;
    }

    public function removeTypeTransactionClient(TypeTransactionClient $typeTransactionClient): self
    {
        if ($this->typeTransactionClients->removeElement($typeTransactionClient)) {
            // set the owning side to null (unless already changed)
            if ($typeTransactionClient->getTransaction() === $this) {
                $typeTransactionClient->setTransaction(null);
            }
        }

        return $this;
    }
}
