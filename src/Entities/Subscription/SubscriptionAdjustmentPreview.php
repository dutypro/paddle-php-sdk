<?php

declare(strict_types=1);

namespace Paddle\SDK\Entities\Subscription;

use Paddle\SDK\Entities\Shared\TotalAdjustments;

class SubscriptionAdjustmentPreview
{
    /**
     * @param array<SubscriptionAdjustmentItem> $items
     */
    public function __construct(
        public string $transactionId,
        public array $items,
        public TotalAdjustments $totals,
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            transactionId: $data['transaction_id'],
            items: array_map(fn (array $item) => SubscriptionAdjustmentItem::from($item), $data['items']),
            totals: TotalAdjustments::from($data['totals']),
        );
    }
}
