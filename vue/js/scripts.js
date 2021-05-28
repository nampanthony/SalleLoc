// Récupérer un evenement par l'intermediaire d'une variable
// let evenements = [{ 
//     "title": "Live coding - Demo",
//     "start": "2021-05-14 11:00:00",
//     "end": "2021-05-14 13:00:00",
//     "backgroundColor": "#839C49"

// },{ 
//     "title": "Live coding - Demo 2",
//     "start": "2021-05-14 14:00:00",
//     "end": "2021-05-14 16:00:00"
// }]

// Récupération des informations en ajax

window.onload = () => {
    let elementCalendrier = document.getElementById("calendrier")

    let xmlhttp = new XMLHttpRequest()

    xmlhttp.onreadystatechange = () => {
        if(xmlhttp.readyState == 4){
            if(xmlhttp.status == 200){
                let evenements = JSON.parse(xmlhttp.responseText)

                    // On instancie le calendrier
                let calendrier = new FullCalendar.Calendar(elementCalendrier, {
                    // On appelle les composants
                    plugins: ['dayGrid', 'timeGrid', 'list'],
                    defaultView: 'timeGridWeek',
                    locale: 'fr', // Traduction
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,list',
                    },
                    buttonText: {
                        today: 'Aujourd\'hui',
                        month: 'Mois',
                        week: 'Semaine',
                        list: 'Liste'
                    },
                    events: evenements,
                    nowIndicator: true
                })
                calendrier.render()
            }
        }
    }

    xmlhttp.open('get', 'http://localhost:8888/SalleLoc/controle/lire.php', true)
    xmlhttp.send(null)


}