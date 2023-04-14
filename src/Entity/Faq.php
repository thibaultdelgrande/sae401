<?php

namespace App\Entity;

use App\Repository\FaqRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FaqRepository::class)]
class Faq
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $answer = null;

    #[ORM\Column(length: 255)]
    private ?string $questionFR = null;

    #[ORM\Column(length: 255)]
    private ?string $questionDE = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $answerFR = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $answerDE = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    public function getQuestionFR(): ?string
    {
        return $this->questionFR;
    }

    public function setQuestionFR(string $questionFR): self
    {
        $this->questionFR = $questionFR;

        return $this;
    }

    public function getQuestionDE(): ?string
    {
        return $this->questionDE;
    }

    public function setQuestionDE(string $questionDE): self
    {
        $this->questionDE = $questionDE;

        return $this;
    }

    public function getAnswerFR(): ?string
    {
        return $this->answerFR;
    }

    public function setAnswerFR(string $answerFR): self
    {
        $this->answerFR = $answerFR;

        return $this;
    }

    public function getAnswerDE(): ?string
    {
        return $this->answerDE;
    }

    public function setAnswerDE(string $answerDE): self
    {
        $this->answerDE = $answerDE;

        return $this;
    }
}
