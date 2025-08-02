declare namespace App {
    namespace Models {
        interface Province {
            id: string;
            name: string;
            code: number;
            // Add other properties if needed
        }

        interface District {
            id: string;
            name: string;
            // Add other properties if needed
        }

        interface Tombon {
            id: string;
            name: string;
            zip_code: string;
            // Add other properties if needed
        }
    }
}
