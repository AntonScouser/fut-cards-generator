<?php

namespace FUTCardGeneratorBundle\Model\DefaultMOTMCard;

use FUTCardGeneratorBundle\Model\DefaultMOTMCard;

class ValueAdapter
{
    const CELL_TOP_LEFT = 0;
    const CELL_TOP_RIGHT = 1;
    const CELL_MIDDLE_LEFT = 2;
    const CELL_MIDDLE_RIGHT = 3;
    const CELL_BOTTOM_LEFT = 4;
    const CELL_BOTTOM_RIGHT = 5;

    /**
     * @var DefaultMOTMCard
     */
    private $defaultMOTMCard;

    /**
     * ValueAdapter constructor.
     * @param DefaultMOTMCard $card
     */
    public function __construct(DefaultMOTMCard $card)
    {
        $this->defaultMOTMCard = $card;
    }

    /**
     * @param int $cell
     * @return string|null
     */
    public function getValueForCell($cell)
    {
        if ($this->isGoalkeeper()) {
            return $this->getGoalkeeperValueForCell($cell);
        }

        if ($this->isDefender()) {
            return $this->getDefenderValueForCell($cell);
        }

        if ($this->isAttacking()) {
            return $this->getAttackingValueForCell($cell);
        }
    }

    private function getDefenderValueForCell($cell)
    {
        switch ($cell) {
            case self::CELL_TOP_LEFT:
                return sprintf('%s ОЦ', $this->defaultMOTMCard->getRate());
            case self::CELL_TOP_RIGHT:
                return sprintf('%s ГОЛ', $this->defaultMOTMCard->getGoals());
            case self::CELL_MIDDLE_LEFT:
                return sprintf('%s АСТ', $this->defaultMOTMCard->getAssists());
            case self::CELL_MIDDLE_RIGHT:
                return sprintf('%s ОТБ', $this->defaultMOTMCard->getDestructions());
            case self::CELL_BOTTOM_LEFT:
                return sprintf('%s ПО', $this->defaultMOTMCard->getSuccessControl());
        }
    }

    /**
     * @param $cell
     * @return string|null
     */
    private function getGoalkeeperValueForCell($cell)
    {
        switch ($cell) {
            case self::CELL_TOP_LEFT:
                return sprintf('%s ОЦ', $this->defaultMOTMCard->getRate());
            case self::CELL_TOP_RIGHT:
                return sprintf('%s СЕВ', $this->defaultMOTMCard->getSaves());
            case self::CELL_MIDDLE_LEFT:
                return sprintf('%s ПС', $this->defaultMOTMCard->getSavesPercents());
            case self::CELL_MIDDLE_RIGHT:
                return sprintf('%s ПГ', $this->defaultMOTMCard->getGoalAgainst());
        }
    }

    /**
     * @param $cell
     * @return string
     */
    private function getAttackingValueForCell($cell)
    {
        switch ($cell) {
            case self::CELL_TOP_LEFT:
                return sprintf('%s ОЦ', $this->defaultMOTMCard->getRate());
            case self::CELL_TOP_RIGHT:
                return sprintf('%s ГОЛ', $this->defaultMOTMCard->getGoals());
            case self::CELL_MIDDLE_LEFT:
                return sprintf('%s АСТ', $this->defaultMOTMCard->getAssists());
        }
    }

    private function isDefender()
    {
        return in_array($this->defaultMOTMCard->getPosition(), [
            'ЦЗ', 'ПЗ', 'ЛЗ', 'ЦОП'
        ]);
    }

    /**
     * @return bool
     */
    private function isAttacking()
    {
        return in_array($this->defaultMOTMCard->getPosition(), [
            'ЛП', 'ПП', 'ЦП', 'ЦАП', 'ЛАП', 'ПАП', 'ЛФА', 'ПФА', 'ФРВ', 'ЦФД'
        ]);
    }

    /**
     * @return bool
     */
    private function isGoalkeeper()
    {
        return $this->defaultMOTMCard->getPosition() == 'ВР';
    }
}
