/**
 * @fileoverview Lógica para la gestión dinámica de programas formativos.
 * Controla la inyección de tarjetas y la expansión de información técnica.
 */

/**
 * @typedef {Object} Programa
 * @property {string} id_card - ID único coincidente con el CSS (ej: card-1).
 * @property {number} numero - Orden visual de la tarjeta.
 * @property {string} bloque - Tipo de bloque ('dentro' o 'fuera').
 * @property {string} titulo - Nombre del curso.
 * @property {string} resumen - Texto introductorio (HTML permitido).
 * @property {string} detalleExtendido - Contenido técnico que aparece al expandir (HTML).
 */

/**
 * @type {Programa[]}
 * Base de datos centralizada de los programas formativos.
 */

const programasData = [

/*
*Bloque Dentro del Campo (Esquema rojo)
*/
/**
* CARD 1: CONTROL, PASE Y CONDUCCIÓN
*/
    {
        id_card: "card-1",
        numero: 1,
        bloque: "dentro", // Determina si va al contenedor negro o rojo
        titulo: "CONTROL, PASE Y CONDUCCIÓN",
        resumen: `El curso de <span class="texto-negrita">'CONTROL, PASE Y CONDUCCIÓN'</span> tiene como objetivo fortalecer las habilidades técnicas fundamentales que todo futbolista necesita para desenvolverse con eficacia dentro del campo. <br><br> Durante una hora de entrenamiento intensivo, los jugadores trabajarán en ejercicios específicos que mejoran <span class="texto-negrita">la precisión, la coordinación y la toma de decisiones con el balón.</span>`,
        detalleExtendido: `
            <p class="detalle-intro">La sesión se dividirá en tres bloques:</p>

            <ol class="lista-bloques">

                <li><strong>Control del balón:</strong> tipos de control (orientado, aéreo, con ambas piernas) para lograr seguridad y dominio.</li>

                <li><strong>Pase:</strong> pases cortos y largos para mejorar precisión, velocidad y visión de juego.</li>

                <li><strong>Conducción:</strong> desplazamiento a distintas velocidades con cambios de ritmo y fintas.</li>

            </ol>

            <p><span class="texto-negrita">Además</span>, se incluirán situaciones reales de juego. Este curso potencia la confianza y eficiencia en el manejo del balón.</p>

            <div class="detalle__intro--textoresaltado">
                <p>
                    Este curso busca no solo perfeccionar la técnica individual, sino también potenciar la confianza y la eficiencia en el manejo del balón, aspectos clave para el desarrollo integral del futbolista moderno.
                </p>
            </div>

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 5 años a 16 años</p>
                <p><strong>GRUPOS:</strong> 5 jugadores</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>ENTRENADOR:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },

/**
* CARD 2: DOMINIO DEL REGATE
*/
    {
        id_card: "card-2",
        numero: 2,
        bloque: "dentro", // Determina si va al contenedor negro o rojo
        titulo: "DOMINIO DEL REGATE",
        resumen: `El curso de <span class="texto-negrita">'DOMINIO DEL REGATE'</span> está diseñado para <span class="texto-negrita">desarrollar la capacidad técnica, la creatividad y la confianza de los futbolistas al enfrentarse a situaciones de uno contra uno.</span> <br> <br>
        Durante una hora de trabajo intensivo, los jugadores practicarán diferentes tipos de regate, cambios de ritmo y dirección, con el objetivo de <span class="texto-negrita">mejorar su eficacia en el desborde y la toma de decisiones ofensivas.</span>`,
        detalleExtendido: `
            <p class="detalle-intro">La sesión se estructura en tres fases principales:</p>

            <ol class="lista-bloques">

                <li><strong>Fundamentos técnicos:</strong> ejercicios enfocados en el <span class="texto-negrita">control cercano del balón, uso de ambas piernas y manejo preciso en espacios reducidos.</span> </li>

                <li><strong>Variantes de regate:</strong> práctica de movimientos específicos (fintas, amagos, giros, cambios de dirección y velocidad) que permitan al jugador <span class="texto-negrita">superar adversarios con seguridad.</span></li>

                <li><strong>Aplicación en el juego:</strong> ejercicios en situaciones reales (uno contra uno, dos contra dos, mini partidos) para <span class="texto-negrita">poner en práctica el regate de forma táctica y colectiva.</span></li>

            </ol> 

            <p><span class="texto-negrita">Además</span>, se incorporarán dinámicas para fortalecer la coordinación, el equilibrio y la agilidad, elementos esenciales para ejecutar regates efectivos bajo presión.</p>

            <div class="detalle__intro--textoresaltado">
                <p>
                    El objetivo final del curso es que el futbolista adquiera un mayor dominio del balón, desarrolle su ingenio ofensivo y se convierta en un jugador más desequilibrante y decisivo dentro del campo.
                </p>
            </div>  

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 5 años a 16 años</p>
                <p><strong>GRUPOS:</strong> 5 jugadores</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>ENTRENADOR:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },

/**
* CARD 3: ATAQUE Y DEFENSA DE LA PARED
*/
    {
        id_card: "card-3",
        numero: 3,
        bloque: "dentro", // Determina si va al contenedor negro o rojo
        titulo: "ATAQUE Y DEFENSA DE LA PARED",
        resumen: `El curso de <span class="texto-negrita">‘ATAQUE Y DEFENSA DE LA PARED’</span> tiene como propósito  <span class="texto-negrita">mejorar la comprensión táctica y la ejecución técnica de una de las jugadas más efectivas del fútbol moderno: la pared.</span> <br><br>
        A través de ejercicios dinámicos y situaciones reales de juego, los futbolistas aprenderán tanto <span class="texto-negrita">a crear oportunidades ofensivas mediante esta acción combinada como a neutralizarla defensivamente.</span> <br> <br>
        En una hora de entrenamiento, <span class="texto-negrita">los futbolistas mejorarán su capacidad para crear y romper líneas de juego, convirtiéndose en jugadores más completos y estratégicos.</span>`,
        detalleExtendido: `
            <p class="detalle-intro">La sesión se dividirá en tres bloques principales:</p>

            <ol class="lista-bloques">

                <li><strong>Fundamentos del ataque con pared:</strong> se trabajará la sincronización entre el pasador y el receptor, el momento exacto del pase, el movimiento sin balón y la precisión en la devolución. El objetivo es  <span class="texto-negrita">lograr fluidez, velocidad y sorpresa en la ejecución ofensiva.</span></li>

                <li><strong>Defensa ante la pared:</strong> se enseñarán los principios de anticipación, marcaje y cobertura, para <span class="texto-negrita">evitar que el rival supere líneas mediante esta jugada</span>. Se enfatizará la lectura del juego y la coordinación defensiva entre compañeros.</span></li>

                <li><strong>Aplicación en el juego real:</strong> mediante pequeños partidos y ejercicios situacionales, <span class="texto-negrita">los jugadores pondrán en práctica tanto el ataque como la defensa de la pared, desarrollando su toma de decisiones bajo presión.</span></li>

            </ol> 
    
            <div class="detalle__intro--textoresaltado">
                <p>
                    Este curso busca fortalecer la inteligencia táctica, la comunicación y el trabajo en equipo, elementos esenciales para entender cuándo y cómo utilizar o detener una pared en el fútbol actual.
                </p>
            </div>

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 5 años a 16 años</p>
                <p><strong>GRUPOS:</strong> 5 jugadores</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>ENTRENADOR:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },

/**
* CARD 4: GOLPEOS
*/   
    {
        id_card: "card-4",
        numero: 4,
        bloque: "dentro", // Determina si va al contenedor negro o rojo
        titulo: "GOLPEOS",
        resumen: `(pase corto, pase medio/largo, tiro a puerta) <br><br>
        El curso de <span class="texto-negrita">‘GOLPEOS DEL BALÓN’</span> está diseñado para <span class="texto-negrita">perfeccionar la técnica, la precisión y la potencia en las distintas formas de golpear el balón</span>, una habilidad esencial para cualquier futbolista. <br><br>
        A lo largo de una hora de entrenamiento específico, los jugadores trabajarán <span class="texto-negrita">diferentes tipos de golpeo aplicados a pases, centros, tiros a portería y despejes</span>, tanto con la pierna dominante como con la no dominante.`,
        detalleExtendido: `
            <p class="detalle-intro">La sesión se estructura en tres fases:</p>

            <ol class="lista-bloques">

                <li><strong>Técnica individual:</strong> ejercicios centrados en la posición del cuerpo, apoyo del pie, superficie de contacto y seguimiento del movimiento. Se busca <span class="">lograr un golpeo limpio, equilibrado y eficiente.</span></li>

                <li><strong>Tipos de golpeo:</strong> práctica de golpes <span class="texto-negrita">rasantes, elevados, con efecto, de volea y a balón detenido</span>, adaptando la técnica a distintas distancias y situaciones de juego.</li>

                <li><strong>Aplicación en contexto real:</strong> ejercicios combinados y finalizaciones que <span class="texto-negrita">integran toma de decisiones, precisión y control emocional</span> frente a la portería o bajo presión del rival.</li>

            </ol> 

            <p><span class="texto-negrita">Además</span>, se trabajarán aspectos complementarios como la coordinación, la fuerza del tren inferior y el equilibrio corporal, factores determinantes para ejecutar un golpeo eficaz.</p>
    
            <div class="detalle__intro--textoresaltado">
                <p>
                    El objetivo principal del curso es que el futbolista mejore su efectividad al pasar, centrar o rematar, desarrolle una mayor confianza técnica y adquiera recursos que le permitan marcar la diferencia en las jugadas decisivas.
                </p>
            </div> 

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 5 años a 16 años</p>
                <p><strong>GRUPOS:</strong> 5 jugadores</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>ENTRENADOR:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },

/**
* CARD 5: CONCEPTOS DEFENSIVOS
*/
    {
        id_card: "card-5",
        numero: 5,
        bloque: "dentro", // Determina si va al contenedor negro o rojo
        titulo: "CONCEPTOS DEFENSIVOS",
        resumen: `El curso de <span class="texto-negrita">‘CONCEPTOS DEFENSIVOS’</span> está diseñado para <span class="texto-negrita">desarrollar habilidades esenciales para proteger la portería y tomar decisiones defensivas efectivas.</span> <br><br>
        En esta sesión de una hora, <span class="texto-negrita">los jugadores trabajarán específicamente los despejes, la anticipación y la temporización</span>, tres elementos clave para <span class="texto-negrita">mejorar la seguridad y eficacia en defensa.</span>`,
        detalleExtendido: `
            <p class="detalle-intro">La sesión se estructura en tres bloques:</p>

            <ol class="lista-bloques">

                <li><strong>Despejes:</strong> se practicarán técnicas de despeje con distintas superficies del pie y en diversas situaciones de presión, priorizando la precisión y seguridad para <span class="texto-negrita">alejar con buen criterio el balón del área de peligro.</span></li>

                <li><strong>Anticipación:</strong> ejercicios orientados a <span class="texto-negrita">leer las intenciones del rival, posicionarse correctamente y actuar antes de que el adversario genere peligro</span>, fortaleciendo la capacidad de reacción y previsión.</li>

                <li><strong>Temporización:</strong> se trabajará el control del ritmo defensivo, aprendiendo a decidir <span class="texto-negrita">cuándo intervenir, cuándo retrasar la presión o mantener la línea</span>, favoreciendo la organización y coordinación con los compañeros.</li>

            </ol> 

            <p><span class="texto-negrita">Además</span>, se integrarán situaciones de juego real que combinan los tres conceptos, fomentando la toma rápida de decisiones, la comunicación y la concentración bajo presión.</p>
    
            <div class="detalle__intro--textoresaltado">
                <p>
                    El objetivo del curso es que los futbolistas adquieran un dominio sólido de los conceptos defensivos, mejorando su eficacia individual y colectiva, y convirtiéndose en jugadores más seguros y estratégicos en la defensa.
                </p>
            </div> 

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 5 años a 16 años</p>
                <p><strong>GRUPOS:</strong> 5 jugadores</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>ENTRENADOR:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    }, 

/**
* CARD 6: CONCEPTOS OFENSIVOS
*/
    {
        id_card: "card-6",
        numero: 6,
        bloque: "dentro", // Determina si va al contenedor negro o rojo
        titulo: "CONCEPTOS OFENSIVOS",
        resumen: `El curso de <span class="texto-negrita">‘CONCEPTOS OFENSIVOS’</span> está diseñado para que los futbolistas desarrollen habilidades tácticas que les permitan <span class="texto-negrita">crear ventajas y oportunidades de gol.</span> <br><br>
        Durante una hora de entrenamiento, <span class="texto-negrita">los jugadores trabajarán aspectos clave como desmarque, separación del rival, ataque del espacio y rondo, fundamentales para mejorar la efectividad ofensiva individual y colectiva.</span>`,
        detalleExtendido: `
            <p class="detalle-intro">La sesión se estructura en tres bloques principales:</p>

            <ol class="lista-bloques">

                <li><strong>Desmarque y separación del rival:</strong> ejercicios para <span class="texto-negrita">aprender a moverse inteligentemente sin balón, generar espacios y facilitar la circulación del juego</span>, evitando ser marcado y ofreciendo opciones de pase a los compañeros.</span></li>

                <li><strong>Atacar el espacio:</strong> práctica de movimientos para <span class="texto-negrita">recibir el balón en zonas libres, anticipando la trayectoria del pase y optimizando la posición</span> para superar líneas defensivas.</li>

                <li><strong>Rondo y coordinación para evitar fuera de juego:</strong> se trabajarán estrategias para <span class"texto-negrita">mantener la posición correcta respecto a la defensa rival</span>, logrando movimientos ofensivos legales y efectivos, combinando timing, velocidad y lectura del juego.</li>

            </ol> 

            <p><span class="texto-negrita">Además</span>, se realizarán situaciones de juego real que integran los conceptos aprendidos, fomentando la toma rápida de decisiones, la comunicación y la creatividad ofensiva.</p>
    
            <div class="detalle__intro--textoresaltado">
                <p>
                    El objetivo del curso es que los futbolistas adquieran un mayor dominio táctico ofensivo, mejoren su capacidad para generar peligro y se conviertan en jugadores más inteligentes y decisivos en ataque.
                </p>
            </div> 

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 5 años a 16 años</p>
                <p><strong>GRUPOS:</strong> 5 jugadores</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>ENTRENADOR:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },

/*
*Bloque Dentro del Campo (Esquema rojo)
*/  
/**
* CARD 7: CÓMO GESTIONAR LA PRESIÓN
*/   

    {
        id_card: "card-7",
        numero: 7,
        bloque: "fuera", // Determina si va al contenedor negro o rojo
        titulo: "CÓMO GESTIONAR LA PRESIÓN",
        resumen: `El curso de <span class="texto-negrita">‘CÓMO GESTIONAR LA PRESIÓN’</span> está diseñado para ayudar a los futbolistas a <span class="texto-negrita">desarrollar herramientas mentales y emocionales que les permitan rendir al máximo en contextos de alta exigencia.</span> <br><br> 
        En el fútbol moderno, la fortaleza psicológica es tan importante como la preparación física o técnica; por eso, <span class="texto-negrita">este curso se centra en fortalecer la mente del jugador para afrontar con equilibrio los desafíos de un deporte tan competitivo.</span>`,
        detalleExtendido: `
            <p class="detalle-intro">Durante una hora de trabajo teórico-práctico, los jugadores aprenderán a:</p>

            <ol class="lista-bloques">

                <li><strong>Reconocer los efectos de la presión:</strong> interiorizando elementos que permitan <span class="texto-negrita">identificar cómo el estrés, la ansiedad o el miedo al error influyen en el rendimiento.</span></li>

                <li><strong>Aplicar técnicas de control emocional:</strong> incorporando estrategias de respiración, visualización y concentración que permitan <span class="texto-negrita">mantener la calma y la confianza en momentos de mucha presión.</span></li>

                <li><strong>Desarrollar resiliencia mental:</strong> aprendiendo técnicas que permitan <span class="texto-negrita">recuperarse de los errores, aceptar la crítica y transformar la tensión en motivación y enfoque positivo.</span></li>

            </ol> 

            <p><span class="texto-negrita">Además</span>, se promoverá la importancia de la salud mental en el deporte, el autocuidado psicológico y la comunicación abierta dentro del equipo, fomentando un entorno de apoyo y bienestar.</p>
    
            <div class="detalle__intro--textoresaltado">
                <p>
                    El objetivo del curso es que cada futbolista adquiera las herramientas necesarias para gestionar la presión con madurez y seguridad, convirtiendo los desafíos emocionales en una fuente de crecimiento y fortaleza personal.
                </p>
            </div> 

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 12 años a 18 años</p>
                <p><strong>GRUPOS:</strong> 5 a 15 alumnos</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>PONENTE:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },

/**
* CARD 8: CLAVES DE LA REPRESENTACIÓN DEPORTIVA
*/ 
    {
        id_card: "card-8",
        numero: 8,
        bloque: "fuera", // Determina si va al contenedor negro o rojo
        titulo: "CLAVES DE LA REPRESENTACIÓN DEPORTIVA",
        resumen: `El curso de <span class="texto-negrita">‘CLAVES DE LA REPRESENTACIÓN DEPORTIVA’</span> está orientado a <span class="texto-negrita">ofrecer a los futbolistas una visión clara y práctica del papel que cumplen los representantes o agentes deportivos en su carrera profesional.</span> <br><br>
        A lo largo de una hora, los jugadores conocerán los <span class="texto-negrita">aspectos fundamentales de la gestión contractual, la imagen personal y la toma de decisiones que influyen directamente en su desarrollo dentro y fuera del campo.</span>`,
        detalleExtendido: `
            <p class="detalle-intro">La sesión se estructura en tres bloques principales:</p>

            <ol class="lista-bloques">

                <li><strong>El rol del representante deportivo:</strong> explicación de las funciones, responsabilidades y límites legales del agente, así como la <span class="texto-negrita">importancia de elegir un profesional ético y preparado.</span></li>

                <li><strong>Gestión de la carrera y contratos:</strong> pautas básicas sobre negociación, derechos de imagen, transferencias y cláusulas contractuales, <span class="texto-negrita">para que el futbolista entienda sus derechos y obligaciones.</span></li>

                <li><strong>Proyección y bienestar del jugador:</strong> consejos sobre cómo mantener una relación sana y transparente con el representante, <span class="texto-negrita">orientada al crecimiento deportivo, económico y personal del jugador.</span></li>

            </ol> 

            <p><span class="texto-negrita">El curso también abordará la importancia de la educación y la toma de decisiones informadas</span>, fomentando la autonomía y la responsabilidad del futbolista en la gestión de su carrera.</p>
    
            <div class="detalle__intro--textoresaltado">
                <p>
                    El objetivo es que los jugadores comprendan las claves de la representación deportiva, aprendan a proteger sus intereses y tomen decisiones conscientes que garanticen un futuro profesional sólido y equilibrado.
                </p>
            </div> 

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 12 años a 18 años</p>
                <p><strong>GRUPOS:</strong> 5 a 15 alumnos</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>PONENTE:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },

/**
* CARD 9: CÓMO INTERACTUAR CON LOS ÁRBITROS
*/    
    {
        id_card: "card-9",
        numero: 9,
        bloque: "fuera", // Determina si va al contenedor negro o rojo
        titulo: "CÓMO INTERACTUAR CON LOS ÁRBITROS",
        resumen: `El curso de <span class="texto-negrita">‘CÓMO INTERACTUAR CON LOS ÁRBITROS’</span> tiene como objetivo <span class="texto-negrita">enseñar a los futbolistas a comunicarse de manera efectiva, respetuosa y estratégica con los árbitros durante los partidos.</span> <br><br>
        Una buena interacción con la autoridad del juego no solo refleja madurez y deportividad, sino que también <span class="texto-negrita">contribuye a mantener el control emocional y mejorar la relación arbitro/jugador en el campo.</span>`,
        detalleExtendido: `
            <p class="detalle-intro">La sesión se estructura en tres bloques principales:</p>

            <ol class="lista-bloques">

                <li><strong>Comprender el rol del árbitro:</strong> conociendo las funciones, limitaciones y la importancia de su figura dentro del juego <span class="texto-negrita">para entender que su objetivo es garantizar la justicia y el respeto a las reglas.</span></li>

                <li><strong>Comunicación efectiva:</strong> con objeto de <span class="texto-negrita">desarrollar habilidades verbales y no verbales para expresar desacuerdos sin perder la calma, utilizar el lenguaje corporal adecuado y elegir el momento oportuno para hablar.</span></li>

                <li><strong>Gestión emocional y liderazgo:</strong> aprendiendo a <span class="texto-negrita">controlar la frustración, aceptar decisiones difíciles y mantener una actitud positiva</span> que influya de manera constructiva en el equipo.</li>

            </ol> 

            <p><span class="texto-negrita">Además</span>, se realizarán dinámicas y ejemplos prácticos de situaciones reales de partido, analizando cómo una buena comunicación puede evitar sanciones innecesarias y favorecer una empatía del árbitro ante acciones potencialmente punibles.</p>
    
            <div class="detalle__intro--textoresaltado">
                <p>
                    El objetivo del curso es que los futbolistas comprendan que interactuar correctamente con los árbitros es parte del juego inteligente, fortaleciendo su madurez, autocontrol y espíritu deportivo.
                </p>
            </div> 

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 12 años a 18 años</p>
                <p><strong>GRUPOS:</strong> 5 a 15 alumnos</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>PONENTE:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },

/**
* CARD 10: APRENDE A ALIMENTARTE COMO UN ATLETA
*/ 
    {
        id_card: "card-10",
        numero: 10,
        bloque: "fuera", // Determina si va al contenedor negro o rojo
        titulo: "APRENDE A ALIMENTARTE COMO UN ATLETA",
        resumen: `El curso <span class="texto-negrita">‘APRENDE A ALIMENTARTE COMO UN ATLETA’</span> está diseñado para <span class="texto-negrita">enseñar a los futbolistas la importancia de una nutrición adecuada y equilibrada como base del rendimiento deportivo.</span> <br><br>
        A lo largo de una hora de formación, <span class="texto-negrita">los alumnos descubrirán cómo la alimentación influye directamente en su energía, recuperación, concentración y prevención de lesiones.</span>`,
        detalleExtendido: `
            <p class="detalle-intro">La sesión se organiza en tres bloques:</p>

            <ol class="lista-bloques">

                <li><strong>Fundamentos de la nutrición deportiva:</strong> explicación sencilla sobre los <span class="texto-negrita">principales grupos de alimentos, el papel de los macronutrientes</span> (carbohidratos, proteínas y grasas) <span class="texto-negrita">y cómo equilibrarlos antes, durante y después del entrenamiento o partido.</span></li>

                <li><strong>Metabolismo y energía:</strong> explicación del metabolismo como motor del rendimiento deportivo, <span class="texto-negrita">cómo el cuerpo transforma los nutrientes en energía, y las diferencias entre el metabolismo aeróbico y anaeróbico.</span></li>

                <li><strong>Hábitos y planificación diaria:</strong> consejos prácticos para <span class="texto-negrita">organizar comidas, hidratarse correctamente y evitar errores comunes</span>, adaptando la dieta a las necesidades individuales de cada futbolista.</li>

            </ol> 
    
            <div class="detalle__intro--textoresaltado">
                <p>
                    El objetivo es que los futbolistas comprendan que comer bien es parte del entrenamiento, y que una nutrición consciente puede marcar la diferencia entre un jugador promedio y un atleta de alto rendimiento.
                </p>
            </div> 

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 12 años a 18 años</p>
                <p><strong>GRUPOS:</strong> 5 a 15 alumnos</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>PONENTE:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },

/**
* CARD 11: CÓMO CREAR TU MARCA PERSONAL
*/ 
    {
        id_card: "card-11",
        numero: 11,
        bloque: "fuera", // Determina si va al contenedor negro o rojo
        titulo: "CÓMO CREAR TU MARCA PERSONAL",
        resumen: `En el fútbol actual, <span class="texto-negrita">destacar no depende solo del talento dentro del campo, sino también de cómo el jugador proyecta sus valores, su historia y su personalidad fuera de él.</span> <br><br>
        El curso <span class="texto-negrita">‘CÓMO CREAR TU MARCA PERSONAL’ está diseñado para que los futbolistas comprendan que son marcas que trascienden el terreno de juego.</span>`,
        detalleExtendido: `
            <p class="detalle-intro">Durante una hora de formación dinámica, los participantes aprenderán a:</p>

            <ol class="lista-bloques">

                <li><strong>Definir su identidad y propósito:</strong> descubriendo quiénes son como deportistas y qué quieren transmitir, <span class="texto-negrita">identificando sus valores, fortalezas y metas personales.</span></li>

                <li><strong>Diseñar su marca personal:</strong> aprendiendo a <span class="texto-negrita">construir una imagen coherente que refleje profesionalismo, disciplina y compromiso, tanto en el juego como en la vida cotidiana.</span></li>

                <li><strong>Comunicar con estrategia:</strong> conociendo bien las herramientas y canales adecuados (Redes Sociales, entrevistas, apariciones públicas) <span class="texto-negrita">para expresar su mensaje de manera clara y positiva, fortaleciendo su reputación.</span></li>

                <li><strong>Gestionar su crecimiento y oportunidades:</strong> comprendiendo <span class="texto-negrita">cómo una marca personal sólida puede abrir puertas a nuevas oportunidades deportivas, comerciales y sociales</span>, potenciando su carrera más allá del terreno de juego.</li>

            </ol> 
    
            <div class="detalle__intro--textoresaltado">
                <p>
                    El objetivo es que los alumnos aprendan a verse como embajadores de su propio nombre, capaces de inspirar y conectar con otros desde la autenticidad y la responsabilidad.
                </p>
            </div> 

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 12 años a 18 años</p>
                <p><strong>GRUPOS:</strong> 5 a 15 alumnos</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>PONENTE:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },

/**
* CARD 12: CÓMO LLEVAR TUS RR.SS.
*/ 
    {
        id_card: "card-12",
        numero: 12,
        bloque: "fuera", // Determina si va al contenedor negro o rojo
        titulo: "CÓMO LLEVAR TUS RR.SS.",
        resumen: `<span class="texto-negrita">¡Dime cómo comunicas y te diré quién eres!</span>  <br><br>
        El curso <span class="texto-negrita">‘CÓMO LLEVAR TUS REDES SOCIALES’</span> está diseñado para  <span class="texto-negrita">enseñar a los futbolistas a usar las RR.SS. de manera profesional, responsable y estratégica</span>, convirtiéndolas en una herramienta que potencie su imagen, marca personal y carrera deportiva. En la era digital, cada publicación comunica, y saber gestionarlas correctamente es tan importante como el rendimiento dentro del campo para impulsar tu carrera como jugador.`,
        detalleExtendido: `
            <p class="detalle-intro">Durante una hora de formación práctica y participativa, los jugadores aprenderán a:</p>

            <ol class="lista-bloques">

                <li><strong>Entender el poder de las Redes Sociales:</strong> con objeto de <span class="texto-negrita">reconocer cómo las redes influyen en la reputación, la visibilidad y las oportunidades profesionales de un futbolista.</span></li>

                <li><strong>Gestionar su presencia digital:</strong> aprendiendo a <span class="texto-negrita">crear contenido auténtico y coherente con su identidad</span>, cuidando el tono, las imágenes y los mensajes que comparten.</li>

                <li><strong>Usar las RR.SS. con responsabilidad:</strong> conocer las buenas prácticas de comunicación, la importancia del respeto, la privacidad y los límites entre la vida personal y profesional.</li>

                <li><strong>Construir una comunidad positiva:</strong> incorporando variables que permitan desarrollar <span class="texto-negrita">estrategias para interactuar con seguidores, medios y marcas de manera constructiva</span>, reforzando su liderazgo y credibilidad dentro del fútbol.</li>

            </ol> 
    
            <div class="detalle__intro--textoresaltado">
                <p>
                    El objetivo es promover en nuestros alumnos, el uso inteligente y ético de las redes sociales como una herramienta para comunicar valores, inspirar y fortalecer la marca personal del futbolista, evitando riesgos innecesarios y potenciando su impacto positivo.
                </p>
            </div> 

            <div class="info-tecnica-grid">
                <p><strong>DURACIÓN:</strong> 1 hora</p>
                <p><strong>DIRIGIDO A:</strong> ♂ ♀ de 12 años a 18 años</p>
                <p><strong>GRUPOS:</strong> 5 a 15 alumnos</p>
                <p><strong>PRECIO:</strong> 60 €</p>
                <p><strong>PONENTE:</strong> Por definir</p>
                <p><strong>UBICACIÓN:</strong> Por definir</p>
            </div>
        `
    },
];

/**
 * Renderiza las tarjetas iniciales en el DOM dentro de sus contenedores respectivos.
 * Se ejecuta automáticamente al cargar el documento.
 * @returns {void}
 */
function renderizarCursos() {
    // 1. "Atrapamos" los contenedores del HTML usando sus IDs
    const containerDentro = document.getElementById('container-dentro');
    const containerFuera = document.getElementById('container-fuera');

    // Verificación de seguridad: si no existen los contenedores, no hacemos nada
    if (!containerDentro || !containerFuera) return;

    // Limpiamos por si hay algo escrito
    containerDentro.innerHTML = '';
    containerFuera.innerHTML = '';

    // 2. Recorremos nuestra lista de datos
    programasData.forEach(curso => {
        // Creamos el elemento <article>
        const card = document.createElement('article');
        card.className = 'programas__card';
        card.id = curso.id_card;

        // 3. Construimos el molde (template)
        card.innerHTML = `
            <div class="programas__card-contenido">
                <span class="programas__card-numero">${curso.numero}</span>
                <div class="programas__card-body ${curso.bloque === 'fuera' ? 'programas__card-body--rojo' : ''}">
                    <h3 class="programas__card-titulo">${curso.titulo}</h3>
                    <div class="contenido-dinamico">
                        <p class="programas__card-texto">${curso.resumen}</p>
                        <!-- Aquí se inyectará la info extra después del clic -->
                    </div>
                </div>
            </div>
            <button class="programas__card-boton ${curso.bloque === 'fuera' ? 'programas__card-boton--rojo' : 'programas__card-boton--negro'}" 
                    onclick="expandirCard('${curso.id_card}')">
                + INFORMACIÓN
            </button>
        `;

        // 4. Lo enviamos al bloque correspondiente (Dentro o Fuera)
        if (curso.bloque === 'dentro') {
            containerDentro.appendChild(card);
        } else {
            containerFuera.appendChild(card);
        }
    });
}

/**
 * Gestiona el evento de expansión de la tarjeta.
 * Inyecta el detalle técnico y transforma el botón en una llamada a la acción (CTA).
 * @param {string} id - El ID de la tarjeta a expandir (ej: 'card-1').
 * @returns {void}
 */
function expandirCard(id) {
    // Buscamos la tarjeta en el HTML y los datos en el Array
    const cardHTML = document.getElementById(id);
    const contenedorTexto = cardHTML.querySelector('.contenido-dinamico');
    const boton = cardHTML.querySelector('.programas__card-boton');
    const datos = programasData.find(c => c.id_card === id);

    // Evitar duplicados: si ya está expandida, no hacemos nada
    if (cardHTML.classList.contains('is-expanded')) return;

    // 1. Inyectamos el contenido extra con una animación suave
    const divExtra = document.createElement('div');
    divExtra.className = 'extra-info-animada';
    divExtra.innerHTML = datos.detalleExtendido;
    contenedorTexto.appendChild(divExtra);

    // 2. Marcamos la tarjeta como expandida
    setTimeout(() => {
        cardHTML.classList.add('is-expanded');
    }, 10);

    // 3. Cambiamos el botón
    boton.innerText = "ME INTERESA";
    
    // 4. Cambiamos la función del botón (ahora redirige)
    boton.onclick = function() {
        window.open('https://wa.me', '_blank'); // Enlace a tu WhatsApp
    };

    /**
     * EVENTO DE CIERRE AUTOMÁTICO
     * Se activa cuando el puntero sale del área de la card.
     */
    cardHTML.onmouseleave = function() {
        // Removemos el contenido extra
        if (divExtra) divExtra.remove();
        
        // Quitamos la clase de estado
        cardHTML.classList.remove('is-expanded');
        
        // Esperamos a que la animación de CSS termine (aprox 400ms) 
        // para cambiar el texto del botón y que no se vea brusco
        setTimeout(() => {
            if (!cardHTML.classList.contains('is-expanded')) {
                boton.innerText = "+ INFORMACIÓN";
                boton.onclick = () => expandirCard(id);
            }
        }, 10);
        
        // Limpiamos este evento para que no se acumule
        cardHTML.onmouseleave = null;
    };    
}


/**
 * Inicializador de la lógica de programas al cargar el DOM.
 */
document.addEventListener('DOMContentLoaded', renderizarCursos);