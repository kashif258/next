import { buildMetadata } from "@/lib/seo";
import { Navbar } from "@/components/layout/navbar";
import { Footer } from "@/components/layout/footer";
import { SectionHeading } from "@/components/sections/section-heading";

export const metadata = buildMetadata({
  title: "About",
  description: "An intimate look at the studio behind premium digital experiences.",
});

export default function AboutPage() {
  return (
    <div className="min-h-screen bg-[#04070b]">
      <Navbar />
      <main>
        <section className="section-shell gap-10 py-24">
          <SectionHeading
            eyebrow="About"
            title="We build with a rare balance of strategy, craft, and emotional resonance."
            description="The studio is founded on a belief that exceptional digital work should feel effortless, refined, and unmistakably human."
          />
          <div className="mt-10 grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
            <div className="glass-panel rounded-[2rem] p-8">
              <p className="text-xl leading-8 text-zinc-200">
                From brand systems to fully immersive web experiences, we shape digital environments that feel elevated, functional, and unforgettable.
              </p>
            </div>
            <div className="glass-panel rounded-[2rem] p-8">
              <p className="eyebrow">Studio values</p>
              <ul className="mt-4 space-y-4 text-zinc-300">
                <li>• Precision over excess</li>
                <li>• Storytelling that feels effortless</li>
                <li>• Motion with purpose</li>
              </ul>
            </div>
          </div>
        </section>
      </main>
      <Footer />
    </div>
  );
}
