<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class InitialData extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        // Seeding Users
        $this->execute("
        INSERT INTO Users (username, password, status) VALUES
        ('user1', 'pass1', 1),
        ('user2', 'pass2', 1),
        ('user3', 'pass3', 1),
        ('user4', 'pass4', 1),
        ('user5', 'pass5', 1),
        ('user6', 'pass6', 1),
        ('user7', 'pass7', 1),
        ('user8', 'pass8', 1),
        ('user9', 'pass9', 1),
        ('user10', 'pass10', 1);");

        //Seeding Courses
        $this->execute("
        INSERT INTO Courses (name) VALUES
        ('Course 1'),
        ('Course 2'); ");

        //Seeding Categories
        $this->execute("
        INSERT INTO DomainCategories (name) VALUES
        ('Memory'),
        ('Concentration'),
        ('Speed'),
        ('Accuracy'),
        ('Logic');");

        //Seeding Exercises
        $this->execute("
        INSERT INTO Exercises (course_id, cat_id, name, points) VALUES
        (1, 1, 'Exercise 1', 10),
        (1, 2, 'Exercise 2', 20),
        (1, 3, 'Exercise 3', 30),
        (1, 4, 'Exercise 4', 40),
        (1, 5, 'Exercise 5', 50),
        (2, 1, 'Exercise 6', 15),
        (2, 2, 'Exercise 7', 25),
        (2, 3, 'Exercise 8', 35),
        (2, 4, 'Exercise 9', 45),
        (2, 5, 'Exercise 10', 55),
        (1, 1, 'Exercise 11', 60),
        (1, 2, 'Exercise 12', 70),
        (2, 3, 'Exercise 13', 80),
        (2, 4, 'Exercise 14', 90);");

        //Seeding SessionScores
        $this->execute("
        INSERT INTO SessionScores (user_id, course_id, exercise_id, category_id, score, score_normalized, start_difficulty, end_difficulty, timestamp) VALUES
        (2, 2, 2, 3, 2, 0.02, 2, 2, '2023-01-2 10:00:00'),
        (3, 1, 3, 4, 3, 0.03, 3, 3, '2023-01-3 10:00:00'),
        (4, 2, 4, 5, 4, 0.04, 4, 4, '2023-01-4 10:00:00'),
        (5, 1, 5, 1, 5, 0.05, 5, 5, '2023-01-5 10:00:00'),
        (6, 2, 6, 2, 6, 0.06, 1, 1, '2023-01-6 10:00:00'),
        (7, 1, 7, 3, 7, 0.07, 2, 2, '2023-01-7 10:00:00'),
        (8, 2, 8, 4, 8, 0.08, 3, 3, '2023-01-8 10:00:00'),
        (9, 1, 9, 5, 9, 0.09, 4, 4, '2023-01-9 10:00:00'),
        (10, 2, 10, 1, 10, 0.1, 5, 5, '2023-01-10 10:00:00'),
        (1, 1, 11, 2, 11, 0.11, 1, 1, '2023-01-11 10:00:00'),
        (2, 2, 12, 3, 12, 0.12, 2, 2, '2023-01-12 10:00:00'),
        (3, 1, 13, 4, 13, 0.13, 3, 3, '2023-01-13 10:00:00'),
        (4, 2, 14, 5, 14, 0.14, 4, 4, '2023-01-14 10:00:00'),
        (5, 1, 1, 2, 15, 0.15, 5, 5, '2023-01-15 10:00:00'),
        (6, 2, 2, 3, 16, 0.16, 1, 1, '2023-01-16 10:00:00'),
        (7, 1, 3, 4, 17, 0.17, 2, 2, '2023-01-17 10:00:00'),
        (8, 2, 4, 5, 18, 0.18, 3, 3, '2023-01-18 10:00:00'),
        (9, 1, 5, 1, 19, 0.19, 4, 4, '2023-01-19 10:00:00'),
        (10, 2, 6, 2, 20, 0.2, 5, 5, '2023-01-20 10:00:00'),
        (1, 1, 7, 3, 21, 0.21, 1, 1, '2023-01-21 10:00:00'),
        (2, 2, 8, 4, 22, 0.22, 2, 2, '2023-01-22 10:00:00'),
        (3, 1, 9, 5, 23, 0.23, 3, 3, '2023-01-23 10:00:00'),
        (4, 2, 10, 1, 24, 0.24, 4, 4, '2023-01-24 10:00:00'),
        (5, 1, 11, 2, 25, 0.25, 5, 5, '2023-01-25 10:00:00'),
        (6, 2, 12, 3, 26, 0.26, 1, 1, '2023-01-26 10:00:00'),
        (7, 1, 13, 4, 27, 0.27, 2, 2, '2023-01-27 10:00:00'),
        (8, 2, 14, 5, 28, 0.28, 3, 3, '2023-01-28 10:00:00'),
        (9, 1, 1, 2, 29, 0.29, 4, 4, '2023-01-29 10:00:00'),
        (10, 2, 2, 3, 30, 0.3, 5, 5, '2023-01-30 10:00:00'),
        (1, 1, 3, 4, 31, 0.31, 1, 1, '2023-01-1 10:00:00'),
        (2, 2, 4, 5, 32, 0.32, 2, 2, '2023-01-2 10:00:00'),
        (3, 1, 5, 1, 33, 0.33, 3, 3, '2023-01-3 10:00:00'),
        (4, 2, 6, 2, 34, 0.34, 4, 4, '2023-01-4 10:00:00'),
        (5, 1, 7, 3, 35, 0.35, 5, 5, '2023-01-5 10:00:00'),
        (6, 2, 8, 4, 36, 0.36, 1, 1, '2023-01-6 10:00:00'),
        (7, 1, 9, 5, 37, 0.37, 2, 2, '2023-01-7 10:00:00'),
        (8, 2, 10, 1, 38, 0.38, 3, 3, '2023-01-8 10:00:00'),
        (9, 1, 11, 2, 39, 0.39, 4, 4, '2023-01-9 10:00:00'),
        (10, 2, 12, 3, 40, 0.4, 5, 5, '2023-01-10 10:00:00'),
        (1, 1, 13, 4, 41, 0.41, 1, 1, '2023-01-11 10:00:00'),
        (2, 2, 14, 5, 42, 0.42, 2, 2, '2023-01-12 10:00:00'),
        (3, 1, 1, 2, 43, 0.43, 3, 3, '2023-01-13 10:00:00'),
        (4, 2, 2, 3, 44, 0.44, 4, 4, '2023-01-14 10:00:00'),
        (5, 1, 3, 4, 45, 0.45, 5, 5, '2023-01-15 10:00:00'),
        (6, 2, 4, 5, 46, 0.46, 1, 1, '2023-01-16 10:00:00'),
        (7, 1, 5, 1, 47, 0.47, 2, 2, '2023-01-17 10:00:00'),
        (8, 2, 6, 2, 48, 0.48, 3, 3, '2023-01-18 10:00:00'),
        (9, 1, 7, 3, 49, 0.49, 4, 4, '2023-01-19 10:00:00'),
        (10, 2, 8, 4, 50, 0.5, 5, 5, '2023-01-20 10:00:00'),
        (1, 1, 9, 5, 51, 0.51, 1, 1, '2023-01-21 10:00:00'),
        (2, 2, 10, 1, 52, 0.52, 2, 2, '2023-01-22 10:00:00'),
        (3, 1, 11, 2, 53, 0.53, 3, 3, '2023-01-23 10:00:00'),
        (4, 2, 12, 3, 54, 0.54, 4, 4, '2023-01-24 10:00:00'),
        (5, 1, 13, 4, 55, 0.55, 5, 5, '2023-01-25 10:00:00'),
        (6, 2, 14, 5, 56, 0.56, 1, 1, '2023-01-26 10:00:00'),
        (7, 1, 1, 2, 57, 0.57, 2, 2, '2023-01-27 10:00:00'),
        (8, 2, 2, 3, 58, 0.58, 3, 3, '2023-01-28 10:00:00'),
        (9, 1, 3, 4, 59, 0.59, 4, 4, '2023-01-29 10:00:00'),
        (10, 2, 4, 5, 60, 0.6, 5, 5, '2023-01-30 10:00:00'),
        (1, 1, 5, 1, 61, 0.61, 1, 1, '2023-01-1 10:00:00'),
        (2, 2, 6, 2, 62, 0.62, 2, 2, '2023-01-2 10:00:00'),
        (3, 1, 7, 3, 63, 0.63, 3, 3, '2023-01-3 10:00:00'),
        (4, 2, 8, 4, 64, 0.64, 4, 4, '2023-01-4 10:00:00'),
        (5, 1, 9, 5, 65, 0.65, 5, 5, '2023-01-5 10:00:00'),
        (6, 2, 10, 1, 66, 0.66, 1, 1, '2023-01-6 10:00:00'),
        (7, 1, 11, 2, 67, 0.67, 2, 2, '2023-01-7 10:00:00'),
        (8, 2, 12, 3, 68, 0.68, 3, 3, '2023-01-8 10:00:00'),
        (9, 1, 13, 4, 69, 0.69, 4, 4, '2023-01-9 10:00:00'),
        (10, 2, 14, 5, 70, 0.7, 5, 5, '2023-01-10 10:00:00'),
        (1, 1, 1, 2, 71, 0.71, 1, 1, '2023-01-11 10:00:00'),
        (2, 2, 2, 3, 72, 0.72, 2, 2, '2023-01-12 10:00:00'),
        (3, 1, 3, 4, 73, 0.73, 3, 3, '2023-01-13 10:00:00'),
        (4, 2, 4, 5, 74, 0.74, 4, 4, '2023-01-14 10:00:00'),
        (5, 1, 5, 1, 75, 0.75, 5, 5, '2023-01-15 10:00:00'),
        (6, 2, 6, 2, 76, 0.76, 1, 1, '2023-01-16 10:00:00'),
        (7, 1, 7, 3, 77, 0.77, 2, 2, '2023-01-17 10:00:00'),
        (8, 2, 8, 4, 78, 0.78, 3, 3, '2023-01-18 10:00:00'),
        (9, 1, 9, 5, 79, 0.79, 4, 4, '2023-01-19 10:00:00'),
        (10, 2, 10, 1, 80, 0.8, 5, 5, '2023-01-20 10:00:00'),
        (1, 1, 11, 2, 81, 0.81, 1, 1, '2023-01-21 10:00:00'),
        (2, 2, 12, 3, 82, 0.82, 2, 2, '2023-01-22 10:00:00'),
        (3, 1, 13, 4, 83, 0.83, 3, 3, '2023-01-23 10:00:00'),
        (4, 2, 14, 5, 84, 0.84, 4, 4, '2023-01-24 10:00:00'),
        (5, 1, 1, 2, 85, 0.85, 5, 5, '2023-01-25 10:00:00'),
        (6, 2, 2, 3, 86, 0.86, 1, 1, '2023-01-26 10:00:00'),
        (7, 1, 3, 4, 87, 0.87, 2, 2, '2023-01-27 10:00:00'),
        (8, 2, 4, 5, 88, 0.88, 3, 3, '2023-01-28 10:00:00'),
        (9, 1, 5, 1, 89, 0.89, 4, 4, '2023-01-29 10:00:00'),
        (10, 2, 6, 2, 90, 0.9, 5, 5, '2023-01-30 10:00:00'),
        (1, 1, 7, 3, 91, 0.91, 1, 1, '2023-01-1 10:00:00'),
        (2, 2, 8, 4, 92, 0.92, 2, 2, '2023-01-2 10:00:00'),
        (3, 1, 9, 5, 93, 0.93, 3, 3, '2023-01-3 10:00:00'),
        (4, 2, 10, 1, 94, 0.94, 4, 4, '2023-01-4 10:00:00'),
        (5, 1, 11, 2, 95, 0.95, 5, 5, '2023-01-5 10:00:00'),
        (6, 2, 12, 3, 96, 0.96, 1, 1, '2023-01-6 10:00:00'),
        (7, 1, 13, 4, 97, 0.97, 2, 2, '2023-01-7 10:00:00'),
        (8, 2, 14, 5, 98, 0.98, 3, 3, '2023-01-8 10:00:00'),
        (9, 1, 1, 2, 99, 0.99, 4, 4, '2023-01-9 10:00:00'),
        (10, 2, 2, 3, 100, 1.0, 5, 5, '2023-01-10 10:00:00'),
        (1, 1, 3, 4, 1, 0.01, 1, 1, '2023-01-11 10:00:00');");

        //Seeding UserLatestDomains with 5 latest activities
        $this->execute("
        INSERT INTO UserLatestDomains (user_id, category_id, session_id, last_updated) VALUES
        (1, 1, 99, '2023-01-31 10:00:00'),
        (2, 2, 98, '2023-01-31 10:00:00'),
        (3, 3, 97, '2023-01-31 10:00:00'),
        (4, 4, 96, '2023-01-31 10:00:00'),
        (5, 5, 95, '2023-01-31 10:00:00'); ");
    }
}
