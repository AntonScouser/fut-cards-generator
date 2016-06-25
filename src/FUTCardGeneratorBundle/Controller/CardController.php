<?php

namespace FUTCardGeneratorBundle\Controller;

use FUTCardGeneratorBundle\Model\DefaultMOTMCard;
use FUTCardGeneratorBundle\Service\MOTMGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CardController extends Controller
{
    /**
     * @Route("/motm-card", name="motm_card")
     */
    public function motmCardAction(Request $request)
    {
        $cardImage = null;
        if ($request->getMethod() == 'POST' && $request->files->count() > 0) {
            $card = new DefaultMOTMCard(
                $request->get('nickname'),
                $request->get('skill'),
                $request->get('position'),
                $request->get('cards_counter'),
                $request->files->get('player_logo'),
                $request->files->get('club_logo'),
                $request->get('rating'),
                $request->get('goal'),
                $request->get('assists'),
                $request->get('destruction'),
                $request->get('success_control'),
                $request->get('full_control'),
                $request->get('saves'),
                $request->get('goals_against'),
                $request->get('dry_matches')
            );

            $imageName = $this->getMOTMGenerator()->generateDefaultCard($card);
            $cardImage = base64_encode(file_get_contents($imageName));
        }

        return $this->render("FUTCardGeneratorBundle:admin:motmCard.html.twig", [
            'cardImage' => $cardImage
        ]);
    }

    /**
     * @return MOTMGenerator
     */
    private function getMOTMGenerator()
    {
        return $this->get('futcardgenerator.motm_generator');
    }
}
