<?php
session_start();

function publicSession($conn)
{
    if (isset($_SESSION['u_id'])) {
        $checkSession = $_SESSION['u_id'];
        $resultSetE = $conn->query("SELECT email FROM users WHERE email= '" . $checkSession . "' LIMIT 1");
        if ($resultSetE->num_rows > 0) {
            header("Location: /dashboard");
            exit;
        }
    } elseif (isset($_SESSION['a_id'])) {
        $checkSession = $_SESSION['a_id'];
        $resultSetE = $conn->query("SELECT email FROM users WHERE email= '" . $checkSession . "' LIMIT 1");
        if ($resultSetE->num_rows > 0) {
            header("Location: /admin");
            exit;
        }
    }
}

function privateSession($conn)
{
    if (isset($_SESSION['u_id'])) {
        $checkSession = $_SESSION['u_id'];
        $resultSetE = $conn->query("SELECT email FROM users WHERE email= '" . $checkSession . "' LIMIT 1");
        if ($resultSetE->num_rows < 1) {
            unset($_SESSION['u_id']);
            session_unset();
            session_destroy();
            header("Location: /auth/signin.php");
            exit;
        }
    } elseif (isset($_SESSION['a_id'])) {
        header("Location: /admin");
        exit;
    } elseif (!isset($_SESSION['u_id'])) {
        header("Location: /auth/signin.php");
        exit;
    }
}

function adminSession($conn)
{
    if (isset($_SESSION['a_id'])) {
        $checkSession = $_SESSION['a_id'];
        $resultSetE = $conn->query("SELECT email FROM users WHERE email= '" . $checkSession . "' LIMIT 1");
        if ($resultSetE->num_rows < 1) {
            unset($_SESSION['a_id']);
            session_unset();
            session_destroy();
            header("Location: /auth/signin.php");
            exit;
        }
    } elseif (isset($_SESSION['u_id'])) {
        header("Location: /dashboard");
        exit;
    } elseif (!isset($_SESSION['a_id'])) {
        header("Location: /auth/signin.php");
        exit;
    }
}