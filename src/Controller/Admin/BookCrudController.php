<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use App\Security\Voter\BookVoter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

// ...

use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
    }

    public function edit(AdminContext $context)
    {
        $entityInstance = $context->getEntity()->getInstance();

        $this->denyAccessUnlessGranted(BookVoter::EDIT, $entityInstance);

        return parent::edit($context);
    }

    public function show(AdminContext $context)
    {
        $entityInstance = $context->getEntity()->getInstance();

        $this->denyAccessUnlessGranted(BookVoter::VIEW, $entityInstance);

        return parent::show($context);
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
