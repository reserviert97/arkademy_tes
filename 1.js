
function biodata() {
    const name = 'Nurlatif Ardhi Pratama';
    const address = 'Ds. Negla, Kec. Losari, Kab. Brebes - Jawa Tengah';
    const hobbies = ['Gaming', 'Reading', 'Coding'];
    const is_married = false;
    const school = {
        highSchool: 'SMAS Daarul Quran',
        university: 'STMIK IKMI CIREBON'
    }
    const skills = [
        {
            name: 'php',
            score: 90,
        },
        {
            name: 'javascript',
            score: 80
        },
        {
            name: 'english',
            score: 75
        },
        {
            name: 'html',
            score: 85
        },
        {
            name: 'css',
            score: 70
        },
    ];

    return {
            'name': name,
            'address': address,
            'hobbies': hobbies,
            'is_married': is_married,
            'school': school,
            'skills': skills
    }
}


const data = biodata();
const json = document.getElementById('json');

json.innerHTML = JSON.stringify(data);



