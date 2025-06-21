<?php 
enum Elixir
{
    case learning;
    case practice;
    case acceptMistake;
    case positiveMind;

    public static function getAll(): array
    {
        return [
            self::learning,
            self::practice,
            self::acceptMistake,
            self::positiveMind,
        ];
    }
    public function getName(): string
    {
        return match ($this) {
            self::learning => 'Learning',
            self::practice => 'Practice',
            self::acceptMistake => 'Accept Mistake',
            self::positiveMind => 'Positive Mind',
        };
    }
    public function getDescription(): string
    {
        return match ($this) {
            self::learning => 'Learn new stuff',
            self::practice => 'Practice refers to the repetition of an activity in order to improve one skill or knowledge',
            self::acceptMistake => 'Own up to your mistake and take steps to correct it.',
            self::positiveMind => 'Have a positive attitude',
        };
    }
    public function getReward(): string
    {
        return match ($this) {
            self::learning => 'Knowledge is power',
            self::practice => 'Practice makes perfect',
            self::acceptMistake => 'Mistakes are proof that you are trying',
            self::positiveMind => 'A positive mind leads to positive outcomes',
        };
    }
    public static function getAllElixirs(): array
    {
        return [
            self::learning->getDescription() => self::learning->getReward(),
            self::practice->getDescription() => self::practice->getReward(),
            self::acceptMistake->getDescription() => self::acceptMistake->getReward(),
            self::positiveMind->getDescription() => self::positiveMind->getReward(),
        ];
    }
    public static function from(string $name): self
    {
        return match ($name) {
            'Learning' => self::learning,
            'Practice' => self::practice,
            'Accept Mistake' => self::acceptMistake,
            'Positive Mind' => self::positiveMind,
            default => throw new InvalidArgumentException("Unknown elixir: $name"),
        };
    }
}
