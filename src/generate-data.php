<!DOCTYPE html>
<html>
    <body>
        <div id="persons" style="width: 1000px; margin: 20px auto;"></div>
        <script type="module">
            import {
                faker
            } from 'https://esm.sh/@faker-js/faker';

            let divPersons = document.getElementById('persons');

            for (let i = 0; i < 120; i++) {
                let firstName = faker.person.firstName();
                let lastName = faker.person.lastName();
                let fullName = firstName + ' ' + lastName;
                let email = (faker.internet.email({
                    firstName,
                    lastName
                })).toLowerCase();
                let phone = faker.helpers.fromRegExp('[1-9]{2}9[7-9]{1}[0-9]{7}');

                let values = `('${fullName.replace("'", "''")}', '${email}', '${phone}'),\n`;

                divPersons.innerHTML = divPersons.innerHTML + '<pre>' + values + '</pre>';
            }
        </script>
    </body>
</html>
