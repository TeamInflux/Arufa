<?php

 /*
 *                       __   _______                   
 *     /\               / _| |__   __|                  
 *    /  \   _ __ _   _| |_ __ _| | ___  __ _ _ __ ___  
 *   / /\ \ | '__| | | |  _/ _` | |/ _ \/ _` | '_ ` _ \ 
 *  / ____ \| |  | |_| | || (_| | |  __/ (_| | | | | | |
 * /_/    \_\_|   \__,_|_| \__,_|_|\___|\__,_|_| |_| |_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the Attribution-ShareAlike 4.0 International Licence as published by
 * the Free Software Foundation, either version 4.0 of the License, or
 * (at your option) any later version.
 *
 * @authors PocketMineTeam and ArufaTeam
 * @arufateam AppleDevelops, Derpific, NFGamerMC, Nought57, RateekMCPE, xZeroMCPE
 * @link arufateam.org
 *
*/

namespace pocketmine\block;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item;
use pocketmine\item\Tool;

class Ice extends Transparent{

	protected $id = self::ICE;

	public function __construct(){

	}

	public function getName() : string{
		return "Ice";
	}

	public function getHardness() {
		return 0.5;
	}

	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}

	public function onBreak(Item $item){
		if($item->getEnchantmentLevel(Enchantment::TYPE_MINING_SILK_TOUCH) === 0){
			$this->getLevel()->setBlock($this, new Water(), true);
		}
		return true;
	}

	public function getDrops(Item $item) : array {
		if($item->getEnchantmentLevel(Enchantment::TYPE_MINING_SILK_TOUCH) > 0){
			return [
				[Item::ICE, 0, 1],
			];
		}else{
			return [];
		}
	}
}
