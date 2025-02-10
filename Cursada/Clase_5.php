<?php


# S: Single Responsibility Principle (SRP)

// No
class Report2 {
    public function generate() {
        return "Report data";
    }

    public function saveToFile($data) {
        file_put_contents('report.txt', $data);
    }
}

// Si
class Report implements IReport {
    public function generate() {
        return "Report data";
    }

    public function analaliceData() {
        return "Report data";
    }

    public function CalculateTrace() {
        return "Report data";
    }

    public function SumComposition() {
        return "Report data";
    }
}


class ReportSaver {
    public function saveToFile(string $data) {
        file_put_contents('report.txt', $data);
    }

    public function saveToDatabase(string $data) {
        #
    }

    public function saveToS3(string $data) {
        #
    }
}

interface IReport {}

// Uso
$report = new Report();
$data = $report->generate();

$saver = new ReportSaver();
$saver->saveToFile($data);
$saver->saveToDatabase($data);
$saver->saveToS3($data);







# O: Open/Closed Principle (OCP)


// No
class Rectangle2 {
    public $width;
    public $height;
}

class AreaCalculator2
{
    public function calculate($shape) {
        if ($shape instanceof Rectangle) {
            return $shape->width * $shape->height;
        }
        
        return 0;
    }
}



// Si

interface Shape {
    public function area();
}

class Rectangle implements Shape {
    public $width, $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}

class Circle implements Shape {
    public $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

class AreaCalculator {
    public function calculate(Shape $shape) {
        return $shape->area();
    }
}

// Uso
$rectangle = new Rectangle(5, 10);
$circle = new Circle(7);

$calculator = new AreaCalculator();
echo $calculator->calculate($rectangle); // 50
echo $calculator->calculate($circle); // 153.93...









# L: Liskov Substitution Principle (LSP)

// No
class Bird2 {
    public function fly() {
        return "Flying";
    }
}

class Penguin2 extends Bird2 {
    public function fly() {
        throw new Exception("Penguins can't fly");
    }
}





// Si

abstract class Bird {
    // Métodos comunes para todas las aves
    public function eat() {

    }

    public function sleep() {

    }
}

interface Flyable {
    public function fly();
}

class Sparrow extends Bird implements Flyable {
    public function fly() {
        return "Flying";
    }
}

class Alcon extends Bird implements Flyable {
    public function fly() {
        return "Flying";
    }
}

class Penguin extends Bird {
    public function swim() {
        return "Swimming";
    }
}

// Uso
$sparrow = new Sparrow();
echo $sparrow->fly(); // "Flying"

$penguin = new Penguin();
echo $penguin->swim(); // "Swimming"

function test(Bird $data) {

    if($data instanceof Flyable) {
        $data->fly();
    }
}



# I: Interface Segregation Principle (ISP)

// No
interface Worker {
    public function work();
    public function eat();
}

class HumanWorker2 implements Worker {
    public function work() {
        return "Working...";
    }

    public function eat() {
        return "Eating...";
    }
}

class RobotWorker2 implements Worker {
    public function work() {
        return "Working...";
    }

    public function eat() {
        throw new Exception("Robots don't eat!");
    }
}


// Si
interface Workable {
    public function work();
}

interface Eatable {
    public function eat();
}

class HumanWorker implements Workable, Eatable {
    public function work() {
        return "Working...";
    }

    public function eat() {
        return "Eating...";
    }
}

class RobotWorker implements Workable {
    public function work() {
        return "Working...";
    }
}

// Uso
$human = new HumanWorker();
echo $human->eat(); // "Eating..."

$robot = new RobotWorker();
echo $robot->work(); // "Working..."





# D: Dependency Inversion Principle (DIP)


// No
class MySQLConnection2 {
    public function connect() {
        return "Connected to MySQL";
    }
}

class UserRepository2 {
    private $db;

    public function __construct() {
        $this->db = new MySQLConnection(); // Acoplamiento fuerte
    }
}


// Si

interface ILegacyCart {
    public function connect();
}

interface ICart {
    public function connect();
}

abstract class CartAbstract
{
    public function adapter()
    {

    }
}

interface DatabaseConnection {
    public function connect();
}

abstract class Query
{
    public function getAll(string $table){
        return "SELECT * FROM $table";
    }

    public function findBy(string $table){
        return "SELECT * FROM $table";
    }

    public function findById(int $id){
        return "SELECT * FROM $id";
    }
}

class MySQLConnection implements DatabaseConnection {
    public function connect() {
        return "Connected to MySQL";
    }
}

class PostgreSQLConnection implements DatabaseConnection {
    public function connect() {
        return "Connected to PostgreSQL";
    }
}

class SQLiteConnection implements DatabaseConnection {
    public function connect() {
        return "Connected to Sqlite";
    }
}

class MariaDBConnection implements DatabaseConnection {
    public function connect() {
        return "Connected to MariaDB";
    }
}

class InnoDBConnection implements DatabaseConnection {
    public function connect() {
        return "Connected to InnoDB";
    }
}

class UserRepository extends Query {
    private $db;

    public function __construct(DatabaseConnection $db) {
        $this->db = $db;
    }

    public function getConnection() {
        return $this->db->connect();
    }
}

// Uso
$mysqlRepo = new UserRepository(new MySQLConnection());
echo $mysqlRepo->getConnection(); // "Connected to MySQL"

$postgresRepo = new UserRepository(new PostgreSQLConnection());
echo $postgresRepo->getConnection(); // "Connected to PostgreSQL"


$SQLite = new UserRepository(new SQLiteConnection());
echo $SQLite->getConnection(); // "Connected to PostgreSQL"

$postgresRepo = new UserRepository(new MariaDBConnection());
echo $postgresRepo->getConnection(); // "Connected to PostgreSQL"

$postgresRepo = new UserRepository(new InnoDBConnection());
echo $postgresRepo->getConnection(); // "Connected to PostgreSQL"


// SELECT * FROM Users