<?php

namespace SimplePhpApi\Model;

/**
 * Class Cards
 * @package SimplePhpApi\Model
 * @author Alfonso Rodriguez <beabys@gmail.com>
 */
class Cards
{

    const DESTINATION = 'destination';
    const ORIGIN = 'origin';

    /**
     * @var array
     */
    protected $orderKeys = [];

    /**
     * @var array
     */
    protected $required = [
        'origin',
        'destination',
        'transport-type'
    ];

    /**
     * Return the correct order of the cards
     * @param array $cards
     * @return array
     */
    public function order(array $cards)
    {
        $order = [];
        if ($this->validateFields($cards)) {
            $keyFirstLink = $this->getFirstLink($cards);
            if (is_null($keyFirstLink)) return $order;
            array_push($this->orderKeys, $keyFirstLink);
            while (count($this->orderKeys) < count($cards)) {
                $last = end($this->orderKeys);
                $nextCard = $this->getNextElement($cards, $last);
                array_push($this->orderKeys, $nextCard);
            }
            $order = $this->generateMessage($cards);
        }
        return $order;
    }

    /**
     * @param $cards
     * @return array
     */
    protected function generateMessage($cards)
    {
        $elements = [];
        foreach ($this->orderKeys as $keyCard) {
            array_push($elements, $cards[$keyCard]);
        }
        return [
            'original' => $cards,
            'sorted' => $elements
        ];
    }

    /**
     * @param $cards
     * @param $lastElement
     * @return mixed
     */
    protected function getNextElement($cards, $lastElement)
    {
        $needle = $cards[$lastElement][self::DESTINATION];
        $key = array_search($needle, array_column($cards, self::ORIGIN));
        return $key;
    }

    /**
     * Validate Required Fields
     * @param array $cards
     * @return bool
     */
    protected function validateFields(array $cards)
    {
        $validation = true;
        foreach ($cards as $card) {
            foreach ($this->required as $elementRequired) {
                if (!array_key_exists($elementRequired, $card)) {
                    $validation = false;
                }
            }
        }
        return $validation;
    }

    /**
     * @param $cards
     * @return mixed|null
     */
    protected function getFirstLink($cards)
    {
        $first = [];
        foreach ($cards as $keyCard => $card) {
            $isFirst = true;
            foreach ($cards as $keyTempCard => $tempCard) {
                if ($keyCard == $keyTempCard) continue;
                if ($tempCard[self::DESTINATION] == $card[self::ORIGIN]) $isFirst = false;
            }
            if ($isFirst) array_push($first, $keyCard);
        }
        return count($first) > 1 ? null : $first[0];
    }

}