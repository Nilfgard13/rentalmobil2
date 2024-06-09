<?php

function addKtp(int $id_user, string $no_ktp): bool
{
    $sql = 'INSERT INTO pelanggan (id_user, no_ktp) VALUES (:id_user, :no_ktp)';
    
    $statement = db()->prepare($sql);
    
    $statement->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $statement->bindValue(':no_ktp', $no_ktp, PDO::PARAM_STR);
    
    try {
        return $statement->execute();
    } catch (PDOException $e) {
        error_log($e->getMessage());
        return false;
    }
}

function getKtpByIdUser(int $id_user = null): ?string
{
    $sql = 'SELECT no_ktp FROM pelanggan WHERE id_user = :id_user';
    
    $statement = db()->prepare($sql);
    
    $statement->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    
    try {
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        // Mengembalikan nilai KTP jika ditemukan, jika tidak mengembalikan null
        return $result ? $result['no_ktp'] : null;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        return null;
    }
}