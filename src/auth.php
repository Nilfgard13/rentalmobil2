<?php
/**
 * Register a user
 *
 * @param string $email
 * @param string $username
 * @param string $password
 * @param bool $is_admin
 * @return bool
 */
function register_user(string $username, string $alamat, string $no_telepon, string $email, string $role, string $password): bool
{
    $sql = 'INSERT INTO users(username, alamat, no_telepon, email, role, password) VALUES (:username, :alamat, :no_telepon, :email, :role, :password)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->bindValue(':alamat', $alamat, PDO::PARAM_STR);
    $statement->bindValue(':no_telepon', $no_telepon, PDO::PARAM_STR);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':role', $role, PDO::PARAM_STR);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);

    try {
        return $statement->execute();
    } catch (PDOException $e) {
        error_log($e->getMessage());
        return false;
    }
}

function find_user_by_username(string $username)
{
    $sql = 'SELECT id_user ,username, password
            FROM users
            WHERE username=:username';

    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function find_role_by_username(string $username)
{
    $sql = 'SELECT username, role
            FROM users
            WHERE username=:username';

    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);

}

function find_All_by_username(string $username)
{
    $sql = 'SELECT *
            FROM users
            WHERE username=:username';

    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);

}

function login(string $username, string $password): bool
{
    $user = find_user_by_username($username);

    // if user found, check the password
    if ($user && password_verify($password, $user['password'])) {

        // prevent session fixation attack
        session_regenerate_id();

        // set username and user_id in the session
        $_SESSION['username'] = $user['username'];
        $_SESSION['id_user'] = $user['id_user'];

        return true;
    }

    return false;
}

function is_user_logged_in(): bool
{
    return isset($_SESSION['username']);
}

function require_login(): void
{
    if (!is_user_logged_in()) {
        redirect_to('login.php');
    }
}

function logout(): void
{
    if (is_user_logged_in()) {
        unset($_SESSION['username'], $_SESSION['user_id']);
        session_destroy();
        redirect_to('login.php');
    }
}

function current_user()
{
    if (is_user_logged_in()) {
        return $_SESSION['username'];
    }
    return null;
}

function getUsers() {
    $sql = "SELECT * FROM users";
    $statement = db()->query($sql);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function addUser($data) {
    $pdo = db();
    $stmt = $pdo->prepare('INSERT INTO users (username, alamat, no_telepon, email, role, password) VALUES (:username, :alamat, :no_telepon, :email, :role, :password)');
    $stmt->execute([
        ':username' => $data['username'],
        ':alamat' => $data['alamat'],
        ':no_telepon' => $data['no_telepon'],
        ':email' => $data['email'],
        ':role' => $data['role'],
        ':password' => password_hash($data['password'], PASSWORD_BCRYPT)
    ]);
}

function editUser($data) {
    $pdo = db();
    $stmt = $pdo->prepare('UPDATE users SET username = :username, alamat = :alamat, no_telepon = :no_telepon, email = :email, role = :role, password = :password WHERE id_user = :id_user');
    $stmt->execute([
        ':username' => $data['username'],
        ':alamat' => $data['alamat'],
        ':no_telepon' => $data['no_telepon'],
        ':email' => $data['email'],
        ':role' => $data['role'],
        ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
        ':id_user' => $data['id_user']
    ]);
}

function deleteUser($id) {
    $pdo = db();
    $stmt = $pdo->prepare('DELETE FROM users WHERE id_user = :id_user');
    $stmt->execute([':id_user' => $id]);
}
