<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomComplet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $cni;

    /**
     * @ORM\OneToMany(targetEntity=TypeTransactionClient::class, mappedBy="client")
     */
    private $typeTransactionClients;

    public function __construct()
    {
        $this->typeTransactionClients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCni(): ?int
    {
        return $this->cni;
    }

    public function setCni(int $cni): self
    {
        $this->cni = $cni;

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
            $typeTransactionClient->setClient($this);
        }

        return $this;
    }

    public function removeTypeTransactionClient(TypeTransactionClient $typeTransactionClient): self
    {
        if ($this->typeTransactionClients->removeElement($typeTransactionClient)) {
            // set the owning side to null (unless already changed)
            if ($typeTransactionClient->getClient() === $this) {
                $typeTransactionClient->setClient(null);
            }
        }

        return $this;
    }
}
