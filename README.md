<div>
<a href="https://github.com/DevJelleS/Procestechniek">
    <img src="images/logo.png" alt="Logo" width="200" height="100">
</a>
</div>

# Procestechniek

Scan met de Samsung Galaxy Tab A7 Lite de QR-code op het kaartje
en zie precies wat dit onderdeel doet in de fabriek.

## Gebouwd Met

Dit project is gebouwd met de volgende programmeertalen:

- [![HTML][html]](https://developer.mozilla.org/en-US/docs/Web/HTML)
- [![CSS][css]](https://developer.mozilla.org/en-US/docs/Web/CSS)
- [![PHP][php]](https://www.php.net/manual/en/)
- [![MYSQL][mysql]](https://dev.mysql.com/doc/)

[html]: https://img.shields.io/badge/HTML-E44D26?style=for-the-badge
[css]: https://img.shields.io/badge/CSS-264DE4?style=for-the-badge
[php]: https://img.shields.io/badge/PHP-777BB3?style=for-the-badge
[mysql]: https://img.shields.io/badge/MYSQL-E48E00?style=for-the-badge

Font dat gebruikt wordt:

- [![RALEWAY][raleway]](https://fonts.google.com/specimen/Raleway?query=raleway)
- [![DRAWSQL][drawsql]](https://drawsql.app/teams/jelles-team/diagrams/procestechniek)

[raleway]: https://img.shields.io/badge/Raleway-4DFF89?style=for-the-badge
[drawsql]: https://img.shields.io/badge/DRAWSQL-4DFF89?style=for-the-badge

## Beschrijving & Informatie

- Database & Inlog Informatie <br>
  Bestand: db_procestechniek.sql
  import dit sql bestand in een database in mysql met de naam db_procestecniek
  dit bestand bevat alle benodigde database data en maakt een gebruiker aan
  waarmee je kan inloggen.
  <details>
    <summary>Login Informatie </summary>
    Gebruikersnaam: admin <br>
    Wachtwoord: airpods
    </details>

  <br>

- Bestanden Informatie <br>
  Als je de map 'src' opend zie je 2 mappen en 1 bestand. Je hebt de map 'admin' hierin staan alle
  bestanden die nodig zijn voor het admin/dashboard systeem en alle informatie van de parts die gemaakt zijn. <br>
  En je hebt de map 'tablet' hierin staan alle bestanden die nodig zijn voor het tablet systeem (Wat je ziet als je een qr-code gescand hebt met de tablet). <br>
  Het bestand index.php zorgt ervoor dat je wordt gestuurd naar de admin inlog pagina.