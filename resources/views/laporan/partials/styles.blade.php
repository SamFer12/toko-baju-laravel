<style>
    .report-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 20px;
    }

    .report-toolbar h2 {
        margin: 0 0 6px;
        font-size: 22px;
        font-weight: 700;
    }

    .report-toolbar p {
        margin: 0;
        color: #68718f;
        font-size: 16px;
    }

    .print-button,
    .filter-button {
        min-height: 45px;
        padding: 10px 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 0;
        border-radius: 9px;
        background: #1f5cff;
        color: #fff;
        text-decoration: none;
        font-weight: 700;
    }

    .print-button svg {
        width: 20px;
        height: 20px;
        stroke: currentColor;
        stroke-width: 2;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .filter-card {
        display: grid;
        grid-template-columns: repeat(2, minmax(190px, 1fr)) auto;
        align-items: end;
        gap: 18px;
        margin-bottom: 22px;
    }

    .filter-field label {
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .filter-field input {
        width: 100%;
        height: 45px;
        padding: 0 14px;
        border: 1px solid #dedede;
        border-radius: 9px;
        background: #fff;
    }

    .filter-actions {
        display: flex;
        gap: 10px;
    }

    .filter-button {
        border: 1px solid #dedede;
        background: #fff;
        color: #1e2b44;
    }

    .filter-button.primary {
        border-color: #1f5cff;
        background: #1f5cff;
        color: #fff;
    }

    .report-print-header {
        display: none;
        margin-bottom: 24px;
        text-align: center;
    }

    .report-print-header h2 {
        margin: 0 0 6px;
        font-size: 24px;
        font-weight: 700;
    }

    .report-print-header p,
    .report-print-header small {
        margin: 0;
        color: #555;
        font-size: 14px;
    }

    .report-summary {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 24px;
    }

    .report-summary.two {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .summary-card {
        min-height: 132px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .summary-card span {
        color: #000;
        font-size: 16px;
        font-weight: 700;
    }

    .summary-card strong {
        color: #000;
        font-size: 28px;
        line-height: 1.1;
    }

    .summary-card small {
        color: #68718f;
        font-size: 14px;
    }

    .report-card {
        padding: 0;
        overflow: hidden;
    }

    .report-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 15px;
    }

    .report-table th,
    .report-table td {
        padding: 15px 18px;
        border-bottom: 1px solid #e5e5e5;
        vertical-align: middle;
    }

    .report-table th {
        background: #f3f6fb;
        color: #1e2b44;
        font-weight: 700;
    }

    .report-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .status-badge {
        padding: 6px 10px;
        display: inline-flex;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
    }

    .status-badge.success {
        background: #eaf8ef;
        color: #1b7f3a;
    }

    .status-badge.danger {
        background: #fff1f1;
        color: #c62828;
    }

    .empty-row {
        color: #68718f;
        text-align: center;
    }

    @media (max-width: 1200px) {
        .report-summary {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .filter-card {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .report-toolbar {
            align-items: stretch;
            flex-direction: column;
        }

        .print-button,
        .filter-button {
            width: 100%;
        }

        .filter-actions {
            flex-direction: column;
        }

        .report-summary,
        .report-summary.two {
            grid-template-columns: 1fr;
        }
    }

    @media print {
        .page-title,
        .page-subtitle {
            display: none;
        }

        .report-print-header {
            display: block;
        }

        .report-summary {
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 10px;
            margin-bottom: 16px;
        }

        .report-summary.two {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .summary-card {
            min-height: 92px;
            padding: 12px;
        }

        .summary-card strong {
            font-size: 18px;
        }

        .report-table {
            font-size: 11px;
        }

        .report-table th,
        .report-table td {
            padding: 7px 8px;
        }
    }
</style>
