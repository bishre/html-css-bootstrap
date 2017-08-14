var firstname = prompt('what is your first name')
var lastname = prompt('what is your last name')
var age = prompt('what is your age')
var height = prompt('how tall are you')
var pet = prompt('what is the neme of your pet')

if (firstname.slice(0,1) == lastname.slice(0,1)) {
	if (20<age<30) {
		if (height >= 170) {
			if (pet.slice(-1) == 'y') {
				alert('welcome back M1');
			}
			}
		}
	}
else {
	alert('thank you for the info')
}
}
