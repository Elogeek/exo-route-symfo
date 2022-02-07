<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user', name: 'user_')]
/**
 * TODO Vous ouvez définir une route principale pour le controler si vous le souhaitez.
 */
class UserController extends AbstractController
{
    /**
     * Cette méthode retourne la liste des utilisateur de l'application
     * @return Response
     * TODO Définissez la route pour accéder à cette fonction du controller UserController
     */
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(): Response
    {
        $message = '
            <table>
                <tr>
                    <th>Nom & prénom :</th>
                    <td>John</td>
                    <td>Doe</td>
                </tr>
                <tr>
                    <th>Rôle sur le site :</th>
                    <td>Super</td>
                    <td>Admin</td>
                </tr>
            </table>
        ';
        // TODO Retournez une Response, renvoyer le code HTML présent dans la variable $message.
        return new Response("<h1>Liste des utilisateurs</h1> $message");
    }


    /**
     * Cette méthode édite un utilisateur en particulier, elle devra prendre un paramètre supplémentaire pour accéder à l'utilisateur en question.
     * @param int $userID
     * @return Response
     * TODO Définissez cette route, n'oubliez pas de définir le paramètre pour être en mesure d'éditer l'utilisateur.
     */
    #[Route('/edit/{userID<\d+>}', name: 'edit', methods: ['GET', 'POST'])]

    public function edit(int $userID): Response
    {
        $html = '
            <div class="success">L\'utilisateur ' . $userID . ' a été modifié avec succès</div>
        ';

        // TODO Retournez une Response contenant le code HTML spécifié dans la variable $html
        return new Response("<h1>Edition de l'user $userID</h1> $html");
    }


    /**
     * Cette méthode supprime un utilisateur, elle prend un paramètre supplémentaire qui doit ABSOLUMENT être un entier, j'attend une regex pour celui ci !!!!!
     * @param int $userId
     * @return Response
     * TODO Définissez cette route.
     */
    #[Route('/delete/{userId<\d+>}', name: 'delete', methods: ['GET', 'DELETE'])]
    public function delete(int $userId): Response
    {
        $html = '
            <div class="success">L\'utilisateur ' . $userId . ' a été supprimé avec succès</div>
        ';

        // TODO Retournez une Response contenant le code HTML spécifié dans la variable $html
        return new Response("<h1>Suppression de l'user: $userId</h1> $html");
    }

}