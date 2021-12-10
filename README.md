
# ORM Php Avancé

Pour utiliser cette application. Il est conseillé d'utiliser Postman


Route et argument.


#### Envoie tous les éléments de table passés.
```GET : /get/tables/{str nom de la table} ```


#### Envoie l'élément correspondant à l'id du ticket.
``` GET : /get/ticket/{int id du ticket}  ```


#### Envoie l'élément correspondant à l'id du comment.
``` GET : /get/ticket/comment/{int id du comment} ```


#### Export la table donné.
```GET : /export/table/{str nom de la table}/{str nom de format à export [json | array] } ```

#### Export un ticket donné.
```GET : /export/ticket/{int id du ticket}/{str nom de format à export [json | array] } ```


#### Api Post de ticket.
```POST : /post/ticket/ ```



Format json suivant :      

        {
            "title" : "Nom du ticket",
            "section" : "service",
            "description" : "Description du ticket"
        }
