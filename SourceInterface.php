<?php

/**
 *
 * @author Niko Peikrishvili
 */
interface SourceInterface
{

    /**
     * კონსტრუქტორი
     * ამ მეთოდში უნდა იყოს მონაცემთა წყაროსთან კავშირის
     * იმპლემენტაცია
     */
    public function __construct();

    /**
     * ვალუტის კოდი
     * @param String $currency
     */
    public function getRate($currency);

    /**
     * მეთოდი საიდანაც ვიღებთ კროსკურსი
     * 
     * @param String $fromCurrency - საიდან
     * @param String $toCurrency - სად
     * @return float კურსი
     */
    public function getCrossRate($fromCurrency, $toCurrency);

    /**
     * მეთოდი ითვლის მიწოდებულ თანხას ერთი ვალუტიდან მეორეში
     * კროსკურსის დახმარებით
     * @param Money $amount
     * @return Money
     */
    public function calculateAmount(Money $amount);
}
