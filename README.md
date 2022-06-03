### Description du projet
Panneau d'administration et site vitrine du site de **fondation225** 

### **Outils et Framework utilisés**
<table>
<tbody>
 <tr>
   <td align="center" valign="middle">
        <a href="https://www.jquery.com/" target="_blank">
          <img width="100px" src="https://upload.wikimedia.org/wikipedia/fr/b/b3/Jquery-logo.png">
        </a>
      </td>
<td align="center" valign="middle">
        <a href="https://laravel.com" target="_blank">
          <img width="100px" src="https://raw.githubusercontent.com/vuejs/vuejs.org/master/themes/vue/source/images/laravel.png">
        </a>
      </td>
      <td align="center" valign="middle">
        <a href="http://smacss.com/" target="_blank">
          <img width="100px" src="http://smacss.com/img/jack-head.png">
        </a>
      </td>
<td align="center" valign="middle">
        <a href="https://www.jetbrains.com/fr-fr/" target="_blank">
          <img width="100px" src="https://upload.wikimedia.org/wikipedia/commons/1/1a/JetBrains_Logo_2016.svg">
        </a>
      </td>
      <td align="center" valign="middle">
        <a href="https://www.npmjs.com/" target="_blank">
          <img width="100px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Npm-logo.svg/1200px-Npm-logo.svg.png">
        </a>
      </td>
      
 </tr>
 <tr>
<td align="center" valign="middle">
        <a href="https://insomnia.rest/" target="_blank">
          <img width="100px" src="https://miro.medium.com/max/1000/1*BFoC90U7sk6Tn9KGeabX6w.png">
        </a>
      </td>
      <td align="center" valign="middle">
        <a href="https://www.mysql.com/fr/" target="_blank">
          <img width="100px" src="https://upload.wikimedia.org/wikipedia/fr/thumb/6/62/MySQL.svg/1200px-MySQL.svg.png">
        </a>
      </td>
      <td align="center" valign="middle">
        <a href="https://git-scm.com/" target="_blank">
          <img width="100px" src="https://git-scm.com/images/logo@2x.png">
        </a>
      </td>
 </tr>
</tbody>
</table>

### Installation du projet
##### configuration réquise
* PHP >= 7.4.1
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Mysql
* git

##### Installer les dépendances avec composer
##### pour les dépendances PHP
``` bash
composer install
```

##### générer une clé pour lancer laravel
``` bash
php artisan key:generate
```

##### lancer la migration
``` bash
php artisan migrate:fresh --seed
```

##### demarrer l'application web
``` bash
php artisan serve
```

### Lien du projet

- Front end : https://127.0.0.1:8000/
- panneau d'administration : https://127.0.0.1:8000/admi