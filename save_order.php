<?php
// Sprawdź, czy żądanie jest typu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Odczytaj dane z żądania
    $data = json_decode(file_get_contents('php://input'), true);

    // Przypisz dane do zmiennych
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $payment_method = $data['payment_method'];
    $shipping = $data['shipping'];
    $total = $data['total'];

    // Przygotuj dane do zapisu
    $orderData = "Imię i nazwisko: $name\n";
    $orderData .= "Adres e-mail: $email\n";
    $orderData .= "Numer telefonu: $phone\n";
    $orderData .= "Metoda płatności: $payment_method\n";
    $orderData .= "Opcja dostawy: $shipping\n";
    $orderData .= "Łączna kwota: $total PLN\n";
    $orderData .= "---------------------------\n";

    // Zapisz dane do pliku
    file_put_contents('orders.txt', $orderData, FILE_APPEND | LOCK_EX);

    // Zwróć odpowiedź
    echo "Zamówienie zapisane pomyślnie.";
} else {
    echo "Nieprawidłowe żądanie.";
}
?>