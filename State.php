<?php

class Phone
{
    private $state;

    public function __construct(State $state)
    {
        $this->transitionTo($state);
    }

    public function transitionTo(State $state): void
    {
        echo "Phone state: Transition to " . get_class($state) . ".\n";
        $this->state = $state;
        $this->state->setPhoneState($this);
    }

    public function clickPowerButton(): void
    {
        $this->state->clickPowerButton();
    }
    
    public function holdPowerButton(): void
    {
        $this->state->holdPowerButton();
    }

    public function connectFromCharger(): void
    {
        echo "Phone is connect the charger\n";
    }

    public function disconnectFromCharging(): void
    {
        echo "Phone is disconnected the charger\n";
    }
}

/**
 * Базовый класс Состояния объявляет методы, которые должны реализовать все
 * Конкретные Состояния, а также предоставляет обратную ссылку на объект
 * Контекст, связанный с Состоянием. Эта обратная ссылка может использоваться
 * Состояниями для передачи Контекста другому Состоянию.
 */
abstract class State
{

    protected $phone;

    public function setPhoneState(Phone $phone)
    {
        $this->phone = $phone;
    }

    abstract public function clickPowerButton(): void;
    abstract public function holdPowerButton(): void;
}

class PhoneLockState extends State
{
    public function clickPowerButton(): void
    {
        echo "Unlock phone\n";
        echo "Get unlock phone state.\n";
        $this->phone->transitionTo(new PhoneUnlockState());
    }
    
    public function holdPowerButton(): void
    {
        echo "Power off phone\n";
        echo "Get power off phone state.\n";
        $this->phone->transitionTo(new PhoneIsTurnedOffState());
    }
}

class PhoneUnlockState extends State
{
    public function clickPowerButton(): void
    {
        echo "Lock phone\n";
        echo "Get lock phone state.\n";
        $this->phone->transitionTo(new PhoneLockState());
    }
    
    public function holdPowerButton(): void
    {
        echo "Power off phone\n";
        echo "Get power off phone state.\n";
        $this->phone->transitionTo(new PhoneIsTurnedOffState());
    }
}

class PhoneIsTurnedOffState extends State
{
    public function clickPowerButton(): void
    {
        echo "Phone is turned off\n";
    }
    
    public function holdPowerButton(): void
    {
        echo "Phone is turned on\n";
        echo "Get lock phone state.\n";
        $this->phone->transitionTo(new PhoneLockState());
    }
}

$phone = new Phone(new PhoneIsTurnedOffState());

echo $phone->connectFromCharger() . "\n";

echo $phone->clickPowerButton() . "\n";

echo $phone->holdPowerButton() . "\n";

echo $phone->clickPowerButton() . "\n";

echo $phone->disconnectFromCharging() . "\n";

echo $phone->clickPowerButton() . "\n";

echo $phone->holdPowerButton() . "\n";
