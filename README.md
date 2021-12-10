
# ORM Php Avancé

Pour utiliser cette application. Il est conseillé d'utiliser Postman

- Lancer d'abord une instance avec : php -S localhost:8080
- Utiliser ticket.sq pour créer votre base de données.


Route et argument.

GET : /get/tables/{str nom de la table} > Envoie tous les éléments de table passés.  

GET : /get/ticket/{int id du ticket} > Envoie l'élément correspondant à l'id du ticket.

GET : /get/ticket/comment/{int id du comment} > Envoie l'élément correspondant à l'id du comment.

GET : /export/table/{str nom de la table}/{str nom de format à export [json | array] } > Export la table donné.

GET : /export/ticket/{int id du ticket}/{str nom de format à export [json | array] } > Export un ticket donné.

POST : /post/ticket/ > Api Post de ticket.
Format json suivant :      
    {
        "title" : "Nom du ticket",
        "section" : "service",
        "description" : "Description du ticket"
    }
