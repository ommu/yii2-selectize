<?php
/**
 * Class SelectizeAsset
 * @package ommu\selectize
 *
 * For more details and usage information on Selectize, see the [guide article on Selectize](guide:selectize).
 * @see yii2mod\selectize\Selectize
 * 
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2023 OMMU (www.ommu.id)
 * @created date 27 April 2023, 04:44 WIB
 * @link https://github.com/ommu/yii2-selectize
 *
 */

namespace ommu\selectize;

class SelectizeAsset extends \yii2mod\selectize\SelectizeAsset
{
    /**
     * @var array list of JavaScript files that this bundle contains
     */
    public $js = [
        'js/selectize.js',
    ];
}
