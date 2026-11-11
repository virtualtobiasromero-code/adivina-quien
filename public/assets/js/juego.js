                                                             //Creación de los personajes, sus atributos y métodos
class  Personaje{ //Definición de la clase "Personaje"
    constructor (person, lugar,  largo_pelo, accesorios, color_ojo, remera, abrigo){ //Variables que se esperan recibir al crear una instancia de la clase
       //Atributos de la clase:
        this.num_person = person
        this.lugar = lugar;
        this.largo_pelo = largo_pelo;
        this.accesorios = accesorios;
        this.color_ojo = color_ojo;
        this.remera = remera;
        this.abrigo = abrigo; 
        
        this.agregar(person, lugar,  largo_pelo, accesorios, color_ojo, remera, abrigo); //Método
    }
    //Método que agrega instantáneamente al personaje a un listado de personajes
    agregar(num_person, lugar,  largo_pelo, accesorios,  color_ojo,  remera ,  abrigo){ 
        const personaje = {num_person, lugar, largo_pelo, accesorios,  color_ojo,  remera ,  abrigo}
        Person.push(personaje)
    }
} //Fin de la definición de la clase "Personaje"

 let Person =[] //Lista de personajes

//Variables que puede obtener el personaje
    const Lugar = ["montañoso",  "arbolado", "edificado"]
    const LargoDelPelo = ["calvo", "corto", "largo"]
    const Accesorios = ["N/A", "anteojos", "sombrero"]
    const ColorDeOjos = ["marrón", "azul", "verde"]
    const Remera = ["simple", "con cuellito"]
    const Abrigo = ["N/A", "impermeable", "buzo"]

// Creación de los personaje por medio de la clase "Personaje" e integración de los mismos a una lista.

    const person0   = new Personaje(/*Numero:*/ 0, Lugar[1], LargoDelPelo[1], Accesorios[1], ColorDeOjos[2], Remera[1], Abrigo[2])
    const person1   = new Personaje(/*Numero:*/ 1, Lugar[2], LargoDelPelo[2], Accesorios[2], ColorDeOjos[0], Remera[1], Abrigo[1])
    const person2   = new Personaje(/*Numero:*/ 2, Lugar[1], LargoDelPelo[2], Accesorios[1], ColorDeOjos[0], Remera[0], Abrigo[2])
    const person3   = new Personaje(/*Numero:*/ 3, Lugar[1], LargoDelPelo[2], Accesorios[2], ColorDeOjos[0], Remera[1], Abrigo[1])
    const person4   = new Personaje(/*Numero:*/ 4, Lugar[0], LargoDelPelo[1], Accesorios[2], ColorDeOjos[0], Remera[0], Abrigo[1])
    const person5   = new Personaje(/*Numero:*/ 5, Lugar[2], LargoDelPelo[2], Accesorios[0], ColorDeOjos[0], Remera[0], Abrigo[2])
    const person6   = new Personaje(/*Numero:*/ 6, Lugar[0], LargoDelPelo[0], Accesorios[1], ColorDeOjos[2], Remera[0], Abrigo[0])
    const person7   = new Personaje(/*Numero:*/ 7, Lugar[0], LargoDelPelo[2], Accesorios[0], ColorDeOjos[1], Remera[0], Abrigo[2])
    const person8   = new Personaje(/*Numero:*/ 8, Lugar[1], LargoDelPelo[0], Accesorios[1], ColorDeOjos[2], Remera[0], Abrigo[0])
    const person9   = new Personaje(/*Numero:*/ 9, Lugar[2], LargoDelPelo[1], Accesorios[1], ColorDeOjos[1], Remera[1], Abrigo[0])
    const person10 = new Personaje(/*Numer:*/10, Lugar[1], LargoDelPelo[1], Accesorios[2], ColorDeOjos[0], Remera[0], Abrigo[0])
    const person11 = new Personaje(/*Numer:*/11, Lugar[0], LargoDelPelo[0], Accesorios[0], ColorDeOjos[1], Remera[1], Abrigo[2])
    const person12 = new Personaje(/*Numer:*/12, Lugar[2], LargoDelPelo[1], Accesorios[0], ColorDeOjos[1], Remera[0], Abrigo[0])
    const person13 = new Personaje(/*Numer:*/13, Lugar[1], LargoDelPelo[0], Accesorios[0], ColorDeOjos[2], Remera[1], Abrigo[0])
    const person14 = new Personaje(/*Numer:*/14, Lugar[0], LargoDelPelo[1], Accesorios[1], ColorDeOjos[0], Remera[1], Abrigo[1])
    const person15 = new Personaje(/*Numer:*/15, Lugar[2], LargoDelPelo[0], Accesorios[2], ColorDeOjos[1], Remera[1], Abrigo[1])

    //Listado de los personajes visibles en la sección "Grilla"

//-----------------------------------------------------------------------------------------------------------------------------------------//
                                 //Contenido que se dibuja en la página y personaje que selecciona la máquina
    let contenido = ''; // Variable que dibujará el contenido
    let seleccionado = undefined // Variable donde quedará guardada el personaje que seleccionó la máquina

for(pers in Person) { // Bucle que se repite hasta que recorra a cada variable del array "Person"
  contenido += `
        <div    
        id = "casa_persN ${pers}"
        class="casilla"
        > 
         <!--Crea una casilla especial para el personaje-->
                <div 
                id="BoxArribaN${pers}"  
                class="cont_pieza arriba" 
                >  
                    <img 
                    src="${IMG_URL}pieza.png" 
                    id="piezaN${pers}" 
                    class = "pieza"
                    draggable="true"
                    >
            </div>
                        <!--Dibuja un bloque verde en la parte superior de la casilla junto a la pieza-->
                <div 
                id="cont_pers"
                class="cont_pers"
                > 
                    <img 
                    src="${IMG_URL}personajes/pers${pers}.jpg" 
                    id="persN${pers}"
                    class="pers"
                    draggable="true" 
                    >
            </div>
                        <!--Crea un espacio especial para dibujar la imagen del personaje-->
                    <div 
                    id="BoxAbajoN${pers}"
                    class="cont_pieza  abajo" 
                    >
            </div>
                          <!--Dibuja un bloque celeste en la parte inferior de la casilla-->
           </div>
  `;
  
    document.getElementById('cuadrilla').innerHTML = contenido; //Se inserta el contenido a la página por cada vuelta que haga el bucle
    if(pers == Person.length-1){ //Detecta cuando está por acabar el bucle, y antes de que lo haga selecciona un personaje aleatorio de la grilla
        seleccionado = Person[Math.floor( Math.random( )*16)];
        contenido=""
    }
}

 //-----------------------------------------------------------------------------------------------------------------------------------------//
                                                                //Interacción entre los elementos y el usuario
    const Piezas = document.querySelectorAll(".pieza"); //Consigue y agrupa  todos los objetos con la clase "pieza"
    const Abajo = document.querySelectorAll(".abajo"); //Consigue y agrupa  todos los objetos con la clase "abajo"
    const Arriba = document.querySelectorAll(".arriba"); //Consigue y agrupa  todos los objetos con la clase "arriba"
    const Persons = document.querySelectorAll(".pers"); //Consigue y agrupa  todos los objetos con la clase "pers"


let objeto = undefined //Variable que guarda el objeto en sí
let Arrastrado = undefined //Variable que guarda el id del objeto dividida en dos partes

Piezas.forEach (pieza => { //Por cada objeto con la clase "pieza" hace:
    pieza.addEventListener("dragstart", function(evento){ //Escucha si se comienza a arrastre de un objeto con clase "pieza" para:
        objeto = evento.target; //Guardar el objeto
        let numObjeto = objeto.id.split("N")[1]; // Guarda el número de la casilla al que pertenece el objeto
        Arrastrado = objeto.id.split("N"); //Guarda un array de dos strings
        //y realiza lo siguiente:
            Abajo.forEach((abajo) => { //Por cada objeto con la clase "abajo" hace:
                let NumBoxB = abajo.id.split("N")[1]  // Guarda el número de la id
                abajo.addEventListener("dragover", function(evento){//Escucha si terminó el arrastre dentro de la caja para:
                    evento.preventDefault(); //Prevenir el comportamiento predeterminado de los navegadores webs.
                })  //Fin de la escucha.

                abajo.addEventListener("drop", function(){ //Escucha si se soltó un objeto con clase "pieza" dentro de la caja para:
                    if (NumBoxB ==  numObjeto){ //Verifica si el número del objeto coincide con el número de la caja de abajo
                        abajo.appendChild(objeto) //Crea el objeto en esa caja
                        pieza.style.transform =  "rotate(180deg)"; //Rota la pieza para que quede invertido verticalmente.
                        Persons[numObjeto].classList.add("descartado"); //Al personaje se le aplica un filtro de blanco y negro
                        Persons[numObjeto].setAttribute('draggable', 'false'); //Desactiva la posibilidad de arrastrar el personaje
                    } //Fin if.
                }) //Fin de la escucha de abajo
            }) //Fin del forEach de Abajo.
            
            Arriba.forEach(arriba => {//Por cada objeto con la clase "arriba" hace:
                let NumBoxA = arriba.id.split("N")[1]; // Guarda el número de la id
                arriba.addEventListener("dragover", function(evento){//Escucha si terminó el arrastre dentro de la caja para:
                    evento.preventDefault(); //Prevenir el comportamiento predeterminado de los navegadores webs.
                }) //Fin de la escucha.
             
                arriba.addEventListener("drop", function(){ //Escucha si se soltó un objeto con clase "pieza" dentro de la caja para:
                    if (NumBoxA == numObjeto){ //Verifica si el número del objeto coincide con el número de la caja de arriba
                        arriba.appendChild(objeto); //Crea el objeto en esa caja
                        pieza.style.transform ="rotate(0deg)"; //Regresa la pieza a su orientación normal
                        Persons[numObjeto].classList.remove("descartado") //Remueve el filtro de blanco y negro sobre el personaje
                        Persons[numObjeto].setAttribute('draggable', 'true') //Permite arrastrar nuevamente al personaje
                    } //Fin del if
                }) //Fin de la escucha de arriba
            }) //Fin de forEach de Arriba
    }) //Fin del escucha de pieza
}) //Fin del forEach de Piezas
//-----------------------------------------------------------------------------------------------------------------------------------------//
                                                                //Creación de las preguntas
for (lug in Lugar){  //Por cada posible lugar con donde puede estar el personaje crea una pregunta diferente
    contenido += `
        <div
        id = "delLugarN${lug}"
        class = "pregunta lugar"
        role = "button"
        tabindex = "0">
        <p> ¿Se encuentra en un lugar ${Lugar[lug]}? </p>
        </div>    
    `
}

for (largpelo in LargoDelPelo){ //Por cada posible largo de cabello con que puede contar el personaje crea una pregunta diferente
    if (largpelo != 0 ){
    contenido += `
        <div
        id = "delPeloN${largpelo}"
        class = "pregunta pelo"
        role = "button"
        tabindex = "0">
                <p> ¿Cuenta con pelo ${LargoDelPelo[largpelo]}? </p>
        </div>    
    `
    }
}

for (accs in Accesorios){ //Por cada posible accesorio que puede llevar el personaje crea una pregunta diferente
    if (accs != 0 ){
    contenido += `
        <div
        id = "delAccesorioN${accs}"
        class = "pregunta accesorio"
        role = "button"
        tabindex = "0">
                <p> ¿Tiene ${Accesorios[accs]}? </p>
        </div>    
    `
    }
}

for (ojocolor in ColorDeOjos){ //Por cada posible color de ojo que puede tener el personaje crea una pregunta diferente
    contenido += `
        <div
        id = "delOjoN${ojocolor}"
        class = "pregunta ojo"
        role = "button"
        tabindex = "0">
                <p> ¿Sus ojos son de color ${ColorDeOjos[ojocolor]}? </p>
        </div>    
    `
}

for (rem in Remera){ //Por cada posible remera con que llevar el personaje crea una pregunta diferente
    contenido += `
        <div
        id = "deLaRemeraN${rem}"
        class = "pregunta remera"
        role = "button"
        tabindex = "0">
                <p> ¿La remera es ${Remera[rem]}? </p>
        </div>    
    `
}

for (abri in Abrigo){ //Por cada posible abrigo que puede llevar el personaje crea una pregunta diferente
    if (abri != 0 ){
    contenido += `
        <div
        id = "delAbrigoN${abri}"
        class = "pregunta abrigo"
        role = "button"
        tabindex = "0">
                <p> ¿Está abrigado con un ${Abrigo[abri]}? </p>
        </div>    
    `
    }
}
document.getElementById("preguntas").innerHTML = contenido; //Insertar las preguntas en la sección de "Preguntas"
//-----------------------------------------------------------------------------------------------------------------------------------------//
                     //Interacción con las preguntas y personajes, y respuesta de la máquina sobre las mismas
 const compu = document.getElementById("bot") //Obtiene el id de la sección "encabezado"
 let CuadroDePregunta = undefined //Variable que guarda el objeto en sí


//Las preguntas NO se arrastran: se responden haciendo clic (o Enter/Espacio con el teclado) sobre ellas
function responderPregunta(cuadro){
    const [tipo, indice] = cuadro.id.split("N"); //Separa el tipo de pregunta y su número (ej: "delOjoN1" => "delOjo", "1")
    let coincide
    switch (tipo){
        case "delLugar":     coincide = seleccionado.lugar      == Lugar[indice];          break;
        case "delPelo":      coincide = seleccionado.largo_pelo == LargoDelPelo[indice];   break;
        case "delAccesorio": coincide = seleccionado.accesorios == Accesorios[indice];     break;
        case "delOjo":       coincide = seleccionado.color_ojo  == ColorDeOjos[indice];    break;
        case "deLaRemera":   coincide = seleccionado.remera     == Remera[indice];         break;
        case "delAbrigo":    coincide = seleccionado.abrigo     == Abrigo[indice];         break;
        default: return;
    }
    cuadro.classList.add("respondido") //Marca la pregunta como respondida
    alert(coincide ? "Si" : "No")
}

const contenedorPreguntas = document.getElementById("preguntas")
contenedorPreguntas.addEventListener("click", function(evento){
    const cuadro = evento.target.closest(".pregunta")
    if (cuadro) responderPregunta(cuadro)
})
contenedorPreguntas.addEventListener("keydown", function(evento){
    if (evento.key !== "Enter" && evento.key !== " ") return
    const cuadro = evento.target.closest(".pregunta")
    if (cuadro){ evento.preventDefault(); responderPregunta(cuadro) }
})

//Los personajes siguen arrastrándose hasta el cuadro de la máquina para intentar adivinar
Persons.forEach (persona => { 
    persona.addEventListener("dragstart", function(interacción){
        Arrastrado = interacción.target.id.split("N");
        CuadroDePregunta = interacción.target.id
    })
})

compu.addEventListener("dragover", function(evento) {
    evento.preventDefault()
})

//-----------------------------------------------------------------------------------------------------------------------------------------//
//                    FUNCIÓN: Mostrar modal de victoria y guardar en BD si está logueado
//-----------------------------------------------------------------------------------------------------------------------------------------//

/**
 * Muestra el modal de victoria.
 * Si el usuario está logueado, envía AJAX a el endpoint guardar-victoria (JuegoController) y
 * muestra el total de victorias actualizado.
 * Si no está logueado, muestra un mensaje invitando a registrarse.
 */
function mostrarVictoria() {
    const modal = document.getElementById('modal-victoria');
    const modalMsg = document.getElementById('modal-msg');
    const modalVictorias = document.getElementById('modal-victorias');

    if (USUARIO_LOGUEADO) {
        // Enviar petición AJAX para guardar la victoria
        fetch(URL_GUARDAR_VICTORIA, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            credentials: 'same-origin'  // Importante: envía las cookies de sesión
        })
        .then(res => res.json())
        .then(data => {
            if (data.ok) {
                modalMsg.textContent = `¡Adivinaste el personaje de la máquina, ${USUARIO_NOMBRE}!`;
                modalVictorias.textContent = `🏆 Total de victorias: ${data.victorias}`;
            } else {
                modalMsg.textContent = '¡Ganaste! (no se pudo guardar la victoria)';
                modalVictorias.textContent = '';
            }
        })
        .catch(() => {
            modalMsg.textContent = '¡Ganaste! (sin conexión al servidor)';
            modalVictorias.textContent = '';
        });
    } else {
        // Usuario no logueado: invitar a registrarse
        modalMsg.textContent = '¡Adivinaste el personaje! Registrate para guardar tus victorias 🏆';
        modalVictorias.textContent = '';
    }

    modal.classList.add('activo');
}

//-----------------------------------------------------------------------------------------------------------------------------------------//
//  Al momento del drop dentro del contenedor del bot, la máquina va a detectar qué tipo de objeto soltás,
//  dando una respuesta diferente dependiendo el caso.
//-----------------------------------------------------------------------------------------------------------------------------------------//

compu.addEventListener("drop", function() {
    switch (Arrastrado[0]){
        case "pers":
            if (seleccionado.num_person == Arrastrado[1]) {
                // ¡VICTORIA! Mostrar modal en lugar de alert
                mostrarVictoria();
            } else {
                alert(`¡Oh no! Personaje equivocado 😬`);
            }
             break;
        case "pieza":
            alert("Eso es una pieza, no un personaje o pregunta 🤔")
    }
})

/* En un futuro...
window.onload = () => {
  alert(`TUTORIAL \n
    ¬ Objetivo: Adivina en que personaje de la cuadrilla 4x4 (ubicada en medio de la página) está pensando la máquina
    ¬ Jugabilidad: Contarás con tres secciones. La primera es en donde podrás interactuar con la máquina, pudiéndole hacer preguntas (ubicadas en la tercera)`);
};
*/
