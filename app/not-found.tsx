import Link from "next/link";
import { ArrowRight } from "lucide-react";

export default function NotFound() {
  return (
    <main className="flex min-h-screen items-center justify-center px-6 py-24">
      <div className="glass-panel max-w-2xl rounded-[2rem] p-10 text-center">
        <p className="eyebrow mb-4">404 / Not Found</p>
        <h1 className="text-4xl font-semibold tracking-[-0.03em] sm:text-5xl">
          The page you are looking for has drifted into the dark.
        </h1>
        <p className="mt-6 text-lg text-zinc-300">
          The experience you sought is unavailable, but the studio is still open for new conversations.
        </p>
        <Link
          href="/"
          className="mt-8 inline-flex items-center gap-2 rounded-full border border-[#d1a96f]/40 bg-[#d1a96f]/10 px-6 py-3 text-sm font-medium text-[#f0c777] transition hover:bg-[#d1a96f]/20"
        >
          Return home <ArrowRight size={16} />
        </Link>
      </div>
    </main>
  );
}
