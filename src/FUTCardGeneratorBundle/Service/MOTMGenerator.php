<?php

namespace FUTCardGeneratorBundle\Service;

use FUTCardGeneratorBundle\Model\DefaultMOTMCard;
use FUTCardGeneratorBundle\Model\DefaultMOTMCard\ValueAdapter;
use FUTCardGeneratorBundle\Model\MOTMCard;
use Imagick;
use ImagickDraw;

class MOTMGenerator
{
    private $defaultDir = '/tmp/';

    public function generateCard()
    {

    }

    /**
     * @param DefaultMOTMCard $card
     * @return string
     */
    public function generateDefaultCard(DefaultMOTMCard $card)
    {
        $adaptedCard = new ValueAdapter($card);

        $background = __DIR__ . '/../Resources/cards/fut_card_yellow.png';
        $background = new Imagick($background);
        $dy = floatval($background->getImageHeight()) / 300.0;
        $w = $background->getImageWidth() / $dy;
        $background->scaleImage($w, 300);
        $offsetX = ($w - 200) / 2 - 5;

        $teamLogo = new Imagick($card->getTeamLogo()->getRealPath());
        $teamLogo->scaleImage(40, 40);
        $teamLogo->transparentPaintImage('#FFFFFF', 0.0, 670, false);

        $country = __DIR__ . '/../Resources/cards/country/russia.png';
        $countryImagick = new Imagick($country);
        $countryImagick->scaleImage(40, 40);

        $faceImagick = new Imagick($card->getPlayerLogo()->getRealPath());
        $faceImagick->scaleImage(120, 120);

        $ps4 = __DIR__ . '/../Resources/cards/playstation-logo-2.png';
        $ps4Imagick = new Imagick($ps4);
        $ps4Imagick->scaleImage(20, 20);

        $font = __DIR__ . '/../Resources/cards/fut_bold.otf';

        $this->addTextToImage(
            $background,
            mb_strtoupper($card->getNickname()),
            $background->getImageWidth() / 2,
            169,
            $font
        );

        $this->addTextToImage(
            $background,
            mb_strtoupper($card->getSkill()),
            $offsetX + 51,
            47,
            $font,
            28
        );

        $this->addTextToImage(
            $background,
            mb_strtoupper($card->getPosition()),
            $offsetX + 51,
            69,
            $font
        );

        $cellMap = [
            ValueAdapter::CELL_TOP_LEFT => [
                'x' => 100,
                'y' => 193
            ],
            ValueAdapter::CELL_MIDDLE_LEFT => [
                'x' => 100,
                'y' => 217
            ],
            ValueAdapter::CELL_BOTTOM_LEFT => [
                'x' => 100,
                'y' => 241
            ],
            ValueAdapter::CELL_TOP_RIGHT => [
                'x' => 185,
                'y' => 193
            ],
            ValueAdapter::CELL_MIDDLE_RIGHT => [
                'x' => 185,
                'y' => 217
            ],
            ValueAdapter::CELL_BOTTOM_RIGHT => [
                'x' => 185,
                'y' => 241
            ],
        ];

        foreach ($cellMap as $cellKey => $cellConfig) {
            $value = $adaptedCard->getValueForCell($cellKey);
            if (empty($value)) {
                continue;
            }

            $this->addTextToImage(
                $background,
                mb_strtoupper($value),
                $cellConfig['x'],
                $cellConfig['y'],
                $font,
                22,
                Imagick::ALIGN_RIGHT
            );
        }

        $this->addTextToImage(
            $background,
            mb_strtoupper(sprintf('OK-%s', $card->getCardsCount())),
            $background->getImageWidth() / 2 + $offsetX,
            266,
            $font,
            15,
            Imagick::ALIGN_CENTER
        );

        $background->compositeImage($teamLogo, Imagick::COMPOSITE_DEFAULT, 31 + $offsetX, 75);
        $background->compositeImage($countryImagick, Imagick::COMPOSITE_DEFAULT, 31 + $offsetX, 110);
        $background->compositeImage($faceImagick, Imagick::COMPOSITE_DEFAULT, 74 + $offsetX, 30);
        $background->compositeImage($ps4Imagick, Imagick::COMPOSITE_DEFAULT, 60 + $offsetX, 252);

        $name = sprintf('%s/%s.png', $this->defaultDir, uniqid('vk_motm'));
        $background->writeImage($name);

        return $name;
    }

    /**
     * @param $text
     * @param $x
     * @param $y
     * @param $font
     * @param int $fontSize
     * @param $alignment
     */
    private function addTextToImage(
        Imagick $background,
        $text,
        $x,
        $y,
        $font,
        $fontSize = 22,
        $alignment = Imagick::ALIGN_CENTER
    ) {
        $draw = new ImagickDraw();
        $draw->setTextAlignment($alignment);
        $draw->setFontSize($fontSize);
        $draw->setFont($font);
        $draw->setStrokeAntialias(true);
        $draw->setTextAntialias(true);
        $draw->setStrokeWidth(0);
        $draw->setFontWeight(100);
        $draw->annotation($x, $y, $text);

        $background->drawImage($draw);
        $draw->clear();
    }
}


