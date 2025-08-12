<?php
namespace Modules\Blog\Enums;

class BlogCategoryType
{
    const ID_ABOUT_PLANT = 1;
    const ID_KNOWLEDGE = 2;
    const ID_NEWS = 3;

    const NAME_ABOUT_PLANT = "About Plant";
    const NAME_KNOWLEDGE = "Knowledge";
    const NAME_NEWS = "News";

    const AVAILABLES = [
        self::ID_ABOUT_PLANT => self::NAME_ABOUT_PLANT,
        self::ID_KNOWLEDGE => self::NAME_KNOWLEDGE,
        self::ID_NEWS => self::NAME_NEWS,
    ];

}