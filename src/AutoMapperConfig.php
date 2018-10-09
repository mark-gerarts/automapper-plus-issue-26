<?php

namespace App;

use App\Entity\Category;
use App\Entity\CategoryDto;
use App\Entity\Product;
use App\Entity\ProductDto;
use AutoMapperPlus\AutoMapperPlusBundle\AutoMapperConfiguratorInterface;
use AutoMapperPlus\Configuration\AutoMapperConfigInterface;
use AutoMapperPlus\MappingOperation\Operation;

class AutoMapperConfig implements AutoMapperConfiguratorInterface
{

    public function configure(AutoMapperConfigInterface $config): void
    {
        $config->registerMapping(Category::class, CategoryDto::class);
        $config->registerMapping(Product::class, ProductDto::class)
            ->forMember('category', Operation::mapTo(CategoryDto::class));
    }

}
