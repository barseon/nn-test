<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InitialSchema extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        //Users
        $this->execute("CREATE TABLE IF NOT EXISTS Users (
                                user_id INT AUTO_INCREMENT PRIMARY KEY,
                                username VARCHAR(255) NOT NULL,
                                password VARCHAR(255) NOT NULL,
                                status TINYINT NOT NULL
                            );");
        //Courses
        $this->execute("CREATE TABLE IF NOT EXISTS Courses (
                                course_id INT AUTO_INCREMENT PRIMARY KEY,
                                name VARCHAR(255) NOT NULL,
                                timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                            );");

        //DomainCategories
        $this->execute("CREATE TABLE IF NOT EXISTS DomainCategories (
                                category_id INT AUTO_INCREMENT PRIMARY KEY,
                                name VARCHAR(255) NOT NULL
                            );");

        //Exercises
        $this->execute("CREATE TABLE IF NOT EXISTS Exercises (
                                exercise_id INT AUTO_INCREMENT PRIMARY KEY,
                                course_id INT NOT NULL,
                                cat_id INT NOT NULL,
                                name VARCHAR(255) NOT NULL,
                                points INT NOT NULL,
                                FOREIGN KEY (course_id) REFERENCES Courses(course_id),
                                FOREIGN KEY (cat_id) REFERENCES DomainCategories(category_id)
                            );");

        //SessionScores
        $this->execute("CREATE TABLE IF NOT EXISTS SessionScores (
                                session_id INT AUTO_INCREMENT PRIMARY KEY,
                                user_id INT NOT NULL,
                                course_id INT NOT NULL,
                                exercise_id INT NOT NULL,
                                category_id INT NOT NULL,
                                score INT,
                                score_normalized FLOAT,
                                start_difficulty INT,
                                end_difficulty INT,
                                timestamp TIMESTAMP NOT NULL,
                                FOREIGN KEY (user_id) REFERENCES Users(user_id),
                                FOREIGN KEY (course_id) REFERENCES Courses(course_id),
                                FOREIGN KEY (exercise_id) REFERENCES Exercises(exercise_id),
                                FOREIGN KEY (category_id) REFERENCES DomainCategories(category_id)
                            );");

        //UserLatestDomains
        $this->execute("CREATE TABLE IF NOT EXISTS UserLatestDomains (
                                user_id INT PRIMARY KEY,
                                category_id INT,
                                session_id INT,
                                last_updated TIMESTAMP NOT NULL,
                                FOREIGN KEY (user_id) REFERENCES Users(user_id),
                                FOREIGN KEY (category_id) REFERENCES DomainCategories(category_id),
                                FOREIGN KEY (session_id) REFERENCES SessionScores(session_id)
                            );");
    }
}
