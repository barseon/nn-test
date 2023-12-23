<?php

declare(strict_types=1);

namespace App\Model;

use PDO;

class DatabaseRepository
{
    public function __construct(
        private readonly PDO $db
    ) {}

    public function getSessionHistoryByUserId(int $userId): ?array
    {
        $stmt = $this->db->prepare("SELECT score, UNIX_TIMESTAMP(timestamp) as date FROM SessionScores WHERE user_id = ? ORDER BY timestamp DESC LIMIT 12");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatestDomainByUserId(int $userId): ?array
    {
        $stmt = $this->db->prepare("SELECT dc.name FROM DomainCategories dc JOIN SessionScores ss ON dc.category_id = ss.category_id WHERE ss.user_id = ? ORDER BY ss.timestamp DESC LIMIT 1");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function userExists(int $userId): int|bool
    {
        $stmt = $this->db->prepare("SELECT user_id FROM Users WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchColumn();
    }
}
