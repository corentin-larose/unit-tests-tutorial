# Generate a fixture from a real life table:
mysqldump test unit_tests_tutorial --no-create-db --no-create-info -uroot -p --where='true limit 10' --xml > _fixtures/unit_tests_tutorial.xml
