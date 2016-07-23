<?php

/**
 * The Database abstract tool will handle generic queries
 *
 * The Database abstract class should be extended or at
 * least implemented in other Model type classes for better
 * use. We should not be using PDO directly in the near
 * future.
 */
class Database {

    private static $db;
    public static $error_list = array();
	public static $query_list = array();

    /**
     * Select a row or set of rows from a query
     *
     * Use this method when selecting a set of information from
     * the database. This will always return results!
     * To query, use the Query static.
     *
     * @param type $query Send a parameterized query
     * @param type $params Optionally send the parameterized set
     */
    public static function Results($query, $params=array()) {
        // Prepare, just in case.
        $sth = self::$db->prepare($query);

        if (!empty($params)):

            foreach ($params as $bind => $value):

                $sth->bindValue($bind, $value);

            endforeach;

        endif;

        try {
            // Try to execute, other wise, catch exception
            $return = $sth->execute();
        } catch (PDOException $e) {

            // Because we don't want uncaught exceptions.
            self::$error_list[] = $e->getMessage();
        }

        if ($return):
            if ($sth->rowCount() > 0):
                return $sth->fetchAll(PDO::FETCH_ASSOC);
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }

    /**
     * Update a row or set of rows
     *
     * Use this method when updating a SQL table. Enter the
     * information as the table name, a key-value pair array
     * of fields to values and the unique ID to update on.
     *
     * @param type $table The table to update
     * @param type $array The key-value pair to submit
     * @param type $id The unique database identifier
     */
    public static function Update($table, $array, $id, $primary_field="vnd_id") {
       // if ($table != "" && !empty($array) && $id != 0 && $id != ""):

            foreach ($array as $field => $value):

                $update[] = $field . " = :" . $field;
                $params[":" . $field] = $value;

            endforeach;

            # Set a base
            $base = "UPDATE $table SET";

            # Update list
            $update = implode(",", $update);

            # The unique ID setter
            $params[":id"] = $id;

            $the_field = ($primary_field != "") ? $primary_field : "vnd_id";

            # Final query
            $query = $base . " " . $update . " " . "WHERE $the_field = :id";


            # Set params and query
            $result = self::Query($query, $params);

            return $result;

        //else:
          //  return false;
       // endif;
    }

    /**
     * Update bulk row or set of rows
     *
     * Use this method when updating a SQL table. Enter the
     * information as the table name, a key-value pair array
     * of fields to values and the unique ID to update on.
     *
     * @param type $table The table to update
     * @param type $array The key-value pair to submit
     * @param type $id The unique database identifier
     */
    public static function BulkUpdate($table, $array, $id, $primary_field="vnd_id") {
        if ($table != "" && !empty($array) && $id != 0 && $id != ""):

            foreach ($array as $field => $value):

                $update[] = $field . " = :" . $field;
                $params[":" . $field] = $value;

            endforeach;

            # Set a base
            $base = "UPDATE $table SET";

            # Update list
            $update = implode(",", $update);
//            echo "<pre>";
//            print_r($update);
//            echo "</pre>";
            # The unique ID setter
            $params[":id"] = $id;

//            echo "<pre>";
//            print_r($params);
//            echo "</pre>";

            $the_field = ($primary_field != "") ? $primary_field : "vnd_id";

            # Final query
            $query = $base . " " . $update . " " . "WHERE $the_field IN (:id) ";


            # Set params and query
            $result = self::Query($query, $params);

            return true;

        else:
            return false;
        endif;
    }

    /**
     * Insert a row or set of rows
     *
     * Use this method when inserting a new row into the DB
     *
     * @param type $table The table to insert into
     * @param type $array The array fields to insert, key-value pairs
     */
    public static function Insert($table, $array) {
        if ($table != "" && !empty($array)):

            $fields = array_keys($array);
            $fieldList = implode(",", $fields);

            foreach ($array as $field => $value):

                $queryBinds[] = ":" . $field;
                $queryParams[":" . $field] = $value;

            endforeach;

            $valueList = implode(",", $queryBinds);

            $q = "INSERT INTO $table ($fieldList) VALUES ($valueList)";

            self::Query($q, $queryParams);

            ## added by amh 2014-02-04, to return last inserted id ##
            $result = self::$db->lastInsertID();
            return $result;

        else:
            return false;
        endif;
    }

    /**
     * Run any query, no results
     *
     * Use this method when querying SQL directly, but
     * not expecting results
     *
     * @param type $query The parametrized query
     * @param type $params The key-value pair of parameters
     */
    public static function Query($query, $params=array()) {
        // Prepare, just in case.
        $sth = self::$db->prepare($query);

        if (!empty($params)):

            foreach ($params as $bind => $value):

                $sth->bindValue($bind, $value);

            endforeach;

        endif;

		self::$query_list[] = $query;

        try {
            // Try to execute, other wise, catch exception
            $return = $sth->execute();
        } catch (PDOException $e) {
            // Because we don't want uncaught exceptions.
            self::$error_list[] = $e->getMessage();			
        }

        if ($return):
            if (self::$db->lastInsertId() != 0):
                return self::$db->lastInsertId();
            else:
                return true;
            endif;
        else:
            return false;
        endif;
    }

    /**
     * Assign a valid PDO object to our DB * */
    public static function Initialize($pdo = null) {
        if (!is_null($pdo)):

            if (is_object($pdo)):

                self::$db = $pdo;

            else:
                return false;
            endif;

        else:
            return false;
        endif;
    }

    public static function getErrors() {
        return self::$error_list;
    }

    public static function getQueries() {
        return self::$query_list;
    }

}

try {
    $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

Database::Initialize($dbh);
?>