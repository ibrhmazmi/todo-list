1.1. instruction for running the app
    run 'php artisan serve'

1.2. Instruction for testing the app
    N/A

1.3. Instruction for building the app
    composer install && npm install && npm run prod

    > create new table name "todo_list"
    > import sql from "/sql/todo_list.sql"
    > reconfig database config in .env file

1.4. interface documentation
    1.  login to your social account.
        p/s: Facebook login is not working as it need to run on secure(SSL), https:// domain.

    2. after successfully login, the url will return something like;
    "http://127.0.0.1:8000/Dashboard?token=46|OyVEvS7jkFHu7osjWAcadWAi7MAbHT7hBr9t1gYH"
    now you have the token param from the url .
    copy the param

    3. your can either access the API directly from browser or use "curl" on terminal to interact with the api using the token from earlier.

    i)For example you can run below syntax in your CLI to get list of object
        "curl -H "Authorization: Bearer 46|OyVEvS7jkFHu7osjWAcadWAi7MAbHT7hBr9t1gYH" http://127.0.0.1:8000/List"

    ii) to add new task, run;
        "curl -H "Authorization: Bearer 46|OyVEvS7jkFHu7osjWAcadWAi7MAbHT7hBr9t1gYH" http://127.0.0.1:8000/Add?task_name="Test" "

    iii) to delete task, run;
        "curl -H "Authorization: Bearer 46|OyVEvS7jkFHu7osjWAcadWAi7MAbHT7hBr9t1gYH" http://127.0.0.1:8000/Delete/{task_id}"

    iv) to mark task as complete, run;
        "curl -H "Authorization: Bearer 46|OyVEvS7jkFHu7osjWAcadWAi7MAbHT7hBr9t1gYH" http://127.0.0.1:8000/Mark-complete/{task_id}"

    v) to logout can run below syntax or click logout button the dashboard;
        "curl -H "Authorization: Bearer 46|OyVEvS7jkFHu7osjWAcadWAi7MAbHT7hBr9t1gYH" http://127.0.0.1:8000/Logout"
        p/s: you need to logout in the browser as above script does not interact with browser session but you'll notice you cant access the api if you run other curl script.

1.5 Docker & testing
    for testing, im skipping it as i dont have the time & experience to run it.

    for Docker, i successfully run the docker composer & build but its not working properly. probably wrong configuration hence the missing docker.
