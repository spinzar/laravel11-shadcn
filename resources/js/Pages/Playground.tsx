import { Button } from "@/components/ui/button";
import { Head } from "@inertiajs/react";

export default function Playground() {
    return (
        <>
            <Head title="Playground" />
            <div className="flex flex-row gap-4 p-10">
                <Button>Primary Button</Button>
            </div>
        </>
    );
}
