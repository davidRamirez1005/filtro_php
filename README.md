# FILTRO DE PHPH



Se crea la base de datos campuslands en el usuario campus 



se definen 4 tablas la primera es la tabla pais con llave primaria el campo idPais, nota(el campo nombrePais salia en la grafica como int y fue modificado a varchar(20)). 

![](/home/apolt01-002/Pictures/Screenshots/Screenshot from 2023-06-28 16-12-40.png)

la segunda tabla es departamento con llave primaria idDep y llave foranea idPais que esta relacionada con la tabla pais

![](/home/apolt01-002/Pictures/Screenshots/Screenshot from 2023-06-28 16-13-55.png)

tercera tabla es region conllave primaria idReg y foranea idDep que esta relacionada con la tabla departamento

![](/home/apolt01-002/Pictures/Screenshots/Screenshot from 2023-06-28 16-15-03.png)

por ultimo la tabla campers que tiene de id principal idCamper y foranea idReg que esta relacionada con la tabla region

![](/home/apolt01-002/Pictures/Screenshots/Screenshot from 2023-06-28 16-16-02.png)

un poco del codigo que se usó en consola para la elaboracion de la base de datos:

![](/home/apolt01-002/Pictures/Screenshots/Screenshot from 2023-06-28 16-17-27.png)