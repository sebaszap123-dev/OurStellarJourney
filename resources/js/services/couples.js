// Importa la librería de manejo de fechas, como moment.js o date-fns

// Función para validar la fecha requerida
export function coupleDate(date, our_date) {
    const fechaRequerida = Date.parse(our_date) // Establece la fecha requerida
    // Validar si la fecha del parámetro "to" es igual o posterior a la fecha requerida
    return date === fechaRequerida
}

export function formatDate(dateString) {
    const date = new Date(dateString);
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const formatter = new Intl.DateTimeFormat('es-ES', options);
    const formattedDate = formatter.format(date);
    return formattedDate;
}

export const myPlaylist = [
    { title: 'Another Love', audio: './assets/songs/Another Love.mp3' },
    { title: 'Chasing Cars', audio: './assets/songs/Chasing Cars.mp3' },
    // { title: "cliché", audio: './assets/songs/cliché.mp3' },
    // { title: "Eastside (with Halsey & Khalid)", audio: './assets/songs/Eastside (with Halsey & Khalid).mp3' },
    { title: 'Falling So in Love With You', audio: './assets/songs/Falling So in Love With You.mp3' },
    { title: "I Won't Give Up", audio: "./assets/songs/I Won't Give Up.mp3" },
    // { title: "Love", audio: './assets/songs/Love.mp3' },
    // { title: "million little reasons", audio: './assets/songs/million little reasons.mp3' },
    { title: 'Nothing Like Us', audio: './assets/songs/Nothing Like Us.mp3' },
    { title: 'Paris in the Rain', audio: './assets/songs/Paris in the Rain.mp3' },
    { title: 'Sweet Boi', audio: './assets/songs/Sweet Boi.mp3' },
    { title: 'The One', audio: './assets/songs/The One.mp3' },
    { title: 'Us', audio: './assets/songs/Us.mp3' },
    { title: "when the party's over", audio: "./assets/songs/when the party's over.mp3" }
    // Agrega más canciones si es necesario
]
