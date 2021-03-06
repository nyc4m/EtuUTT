<?php

namespace Etu\Core\CoreBundle\Menu\UserMenu;

/**
 * User menu renderer: display the menu builder using user menu template.
 */
class UserMenuRenderer
{
    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * Constructor.
     *
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * Render the menu in the user menu context.
     *
     * @param \Etu\Core\CoreBundle\Menu\UserMenu\UserMenuBuilder $builder
     *
     * @return string
     */
    public function render(UserMenuBuilder $builder)
    {
        $items = $builder->getItems();
        $positions = [];

        foreach ($items as $key => $item) {
            $positions[$key] = $item->getPosition();
        }

        asort($positions);

        $sortedItems = [];

        foreach ($positions as $key => $position) {
            $sortedItems[] = $items[$key];
        }

        return $this->twig->render('EtuCoreBundle:Menu:user_menu.html.twig', ['items' => $sortedItems]);
    }
}
