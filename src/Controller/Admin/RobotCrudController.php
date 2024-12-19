<?php

namespace App\Controller\Admin;

use App\Entity\Robot;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RobotCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Robot::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [

            FormField::addColumn(8),
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextEditorField::new('description'),
            MoneyField::new('price')->setCurrency('EUR'),
            AssociationField::new('category'),
            

            FormField::addColumn(4),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class),
            ImageField::new('image')
                ->setBasePath('/upload/robots')
                ->onlyOnIndex(),
        ];
    }
}