<?php

/**
 * NOTE:
 * Pode ser aplicado a outras classes.
 */
trait HasBirthday {
    private string $birthday;

    public function getBirthday(): string
    {
        return $this->birthday;
    }
}

/**
 * NOTE:
 * Isto é uma parent Class.
 * Todas as propriedades daqui vao ser inherited pelas suas sub classes.
 *
 */
class Animal implements NeedsPrintInterface
{
    use HasBirthday; // aplica o HasBirthday trait.
    private string $name; // esta em todas as subclasses

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->birthday = "BoD";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function print(): void
    {
        var_dump($this);
    }
}

/**
 * NOTE:
 * Isto é uma subclasse.
 * Da inherit a todas as propriedades e métodos da parent class.
 */
class Cao extends Animal
{
    private bool $tail; // exclusive to Cao

    public function __construct(string $name, bool $tail)
    {
        parent::__construct($name);

        $this->tail = $tail;
    }

    public function getTail(): bool
    {
        return $this->tail;
    }
}

/**
 * NOTE:
 * Forca a implementacao do metodo .print() em todas as classes que implementam este interface.
 * Interfaces funcionam basicamente como a blueprint de uma class.
 */
interface NeedsPrintInterface
{
    public function print(): void;
}

$caoOne = new Cao("Cao Abc", false);
$caoTwo = new Cao("Cao Cdf", true);

$caoOne->print();
$caoTwo->print();

$variavel = "foo";