<?php

namespace FUTCardGeneratorBundle\Model;

use Symfony\Component\HttpFoundation\File\File;

class DefaultMOTMCard
{
    /**
     * @var string
     */
    private $nickname;

    /**
     * @var int
     */
    private $skill;

    /**
     * @var string
     */
    private $position;

    /**
     * @var int
     */
    private $cardsCount;

    /**
     * @var File
     */
    private $playerLogo;

    /**
     * @var File
     */
    private $teamLogo;

    /**
     * @var float
     */
    private $rate;

    /**
     * @var int
     */
    private $goals;

    /**
     * @var int
     */
    private $assists;

    /**
     * @var int
     */
    private $destructions;

    /**
     * @var int
     */
    private $successControl;

    /**
     * @var int
     */
    private $fullControll;

    /**
     * @var int
     */
    private $saves;

    /**
     * @var int
     */
    private $goalAgainst;

    /**
     * @var int
     */
    private $dryMatches;

    /**
     * @param string $nickname
     * @param int $skill
     * @param string $position
     * @param int $cardsCount
     * @param File $playerLogo
     * @param File $teamLogo
     * @param float $rate
     * @param int $goals
     * @param int $assists
     * @param int $destructions
     * @param int $successControl
     * @param int $fullControll
     */
    public function __construct(
        $nickname,
        $skill,
        $position,
        $cardsCount,
        File $playerLogo,
        File $teamLogo,
        $rate,
        $goals,
        $assists,
        $destructions,
        $successControl,
        $fullControll,
        $saves,
        $goalAgainst,
        $dryMatches
    ) {
        $this->nickname = $nickname;
        $this->skill = $skill;
        $this->position = $position;
        $this->cardsCount = $cardsCount;
        $this->playerLogo = $playerLogo;
        $this->teamLogo = $teamLogo;
        $this->rate = $rate;
        $this->goals = $goals;
        $this->assists = $assists;
        $this->destructions = $destructions;
        $this->successControl = $successControl;
        $this->fullControll = $fullControll;
        $this->saves = $saves;
        $this->goalAgainst = $goalAgainst;
        $this->dryMatches = $dryMatches;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @return int
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return int
     */
    public function getCardsCount()
    {
        return $this->cardsCount;
    }

    /**
     * @return File
     */
    public function getPlayerLogo()
    {
        return $this->playerLogo;
    }

    /**
     * @return File
     */
    public function getTeamLogo()
    {
        return $this->teamLogo;
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @return int
     */
    public function getGoals()
    {
        return $this->goals;
    }

    /**
     * @return int
     */
    public function getAssists()
    {
        return $this->assists;
    }

    /**
     * @return int
     */
    public function getDestructions()
    {
        return $this->destructions;
    }

    /**
     * @return int
     */
    public function getSuccessControl()
    {
        return $this->successControl;
    }

    /**
     * @return int
     */
    public function getFullControll()
    {
        return $this->fullControll;
    }

    /**
     * @return int
     */
    public function getControl()
    {
        if (!$this->fullControll) {
            return 0;
        }

        return intval(round($this->successControl / $this->fullControll * 100.0));
    }

    /**
     * @return int
     */
    public function getSaves()
    {
        return $this->saves;
    }

    /**
     * @return int
     */
    public function getGoalAgainst()
    {
        return $this->goalAgainst;
    }

    /**
     * @return int
     */
    public function getDryMatches()
    {
        return $this->dryMatches;
    }

    /**
     * @return int
     */
    public function getSavesPercents()
    {
        if ($this->getSaves() == 0) {
            return 0;
        }

        if ($this->getGoalAgainst() == 0) {
            return 100;
        }

        return intval(round($this->getSaves() / $this->getGoalAgainst() * 100));
    }
}
